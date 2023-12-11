/**
 * @license Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
	// Define changes to default configuration here. For example:
	config.uiColor = '#9d72ff';
	config.language = 'vi';
	config.height = '800px';
    config.extraPlugins = 'image2';
    config.removeButtons = 'Find,Save,NewPage,Replace,Scayt,Form,Checkbox,Radio,TextField,' +
        'Textarea,Select,Button,ImageButton,HiddenField,Superscript,Subscript,' +
        'Anchor,Link,Unlink,Iframe,PageBreak,SpecialChar,HorizontalRule,Table,About,Language,CreateDiv,Image,';
};

function getCkeditorMediaUrl(path) {
    return '//' + window.location.host + path;
}

$.each(CKEDITOR.instances, function (index, ins) {
    ins.addCommand("InsertCustomImages", {
        exec: function (edt) {
            $('#ckeditor_insert_images_' + index).click();
            if (edt.config.insertImage) {
                $('#ckeditor_insert_images_' + index).click();
            }
        }
    });

    ins.ui.addButton('InsertCustomImages', {
        label: "Chèn ảnh",
        command: 'InsertCustomImages',
        toolbar: 'insert',
        icon: 'add-image.png',
    });

    $('body').append('<input multiple hidden type="file" id="ckeditor_insert_images_' + index + '">');

    $('#ckeditor_insert_images_' + index).change(function (e) {
        $.each(this.files, function (index, file) {
            const form = new FormData();
            form.append("file", file);
            $.ajax({
                url: getCkeditorMediaUrl('/api/ckeditor/upload-image'),
                type: 'post',
                cache: false,
                processData: false,
                contentType: false,
                async: true,
                data: form,
                success: function (res) {
                    console.log(res)
                    if (res.status === 'success') {
                        toastr.clear();
                        NioApp.Toast('Chèn ảnh thành công!', 'success', {
                            position: 'top-right'
                        });
                        ins.insertHtml('<p style="text-align:center"><img alt="" src="' + res.data + '" class="x" width="500"></p>');
                    } else {
                        Swal.fire("Lỗi!", 'Đã có lỗi xảy ra, chèn ảnh không thành công!', "error");
                    }
                    $('#ckeditor_insert_images_' + index).val(null);
                }
            });
        });
    });

    ins.on('instanceReady', function () {
        ins.document.on("keyup", CK_jQ);
        ins.document.on("paste", CK_jQ);
        ins.document.on("keypress", CK_jQ);
        ins.document.on("blur", CK_jQ);
        ins.document.on("change", CK_jQ);
    });

    function CK_jQ() {
        ins.updateElement();
        $(ins.element.$).focusout();
    }
});
