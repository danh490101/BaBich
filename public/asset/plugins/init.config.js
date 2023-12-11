jconfirm.defaults = {
  scrollToPreviousElement: false,
  scrollToPreviousElementAnimate: false,
  defaultButtons: {
    ok: {
      text: 'Đóng'
    },
    cancel: {
      text: 'Huỷ bỏ'
    }
  },
  theme: 'bootstrap',
  draggable: false,
  animateFromElement: false,
  columnClass: 'col-sm-10 col-md-8 col-lg-5'
};

$.validator.setDefaults({
  errorElement: "span",
  errorPlacement: function (error, element) {
    let placement = $(element).data('error');
    if (placement) {
      $(placement).append(error)
    } else {
      error.insertAfter(element);
    }
  },
});

