jQuery.validator.addMethod(
  "filesize",
  function (value, element, param) {
    return this.optional(element) || element.files[0].size <= param * 1000000;
  },
  "Ảnh không được quá {0}MB"
);

jQuery.validator.addMethod('customEmail', function (value) {
  let regexCustomEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return value.trim().match(regexCustomEmail);
});

jQuery.validator.addMethod('customPhone', function (value) {
  let strippedValue = value.replace(/\s+/g, '');
  let regexCustomPhone = /^(\+84[0][1-9]\d{8,9}|\+84\d{9,10}|[0][1-9]\d{8,9})$/;
  let isValid = strippedValue.match(regexCustomPhone);
  if (isValid && value.indexOf(' ') !== -1) {
    return false;
  }
  return isValid;
});

jQuery.validator.addMethod('customEmailEmpty', function (value, element) {
  if (this.optional(element)) {
    return true;
  }
  let regexCustomEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return value.trim().match(regexCustomEmail);
});

jQuery.validator.addMethod('customPhoneEmpty', function (value, element) {
  if (this.optional(element)) {
    return true;
  }
  let strippedValue = value.replace(/\s+/g, '');
  let regexCustomPhone = /^(\+84[0][1-9]\d{8,9}|\+84\d{9,10}|[0][1-9]\d{8,9})$/;
  let isValid = strippedValue.match(regexCustomPhone);
  if (isValid && value.indexOf(' ') !== -1) {
    return false;
  }
  return isValid;
});

jQuery.validator.addMethod('customText', function (value) {
  let regexCustomName = /^([^(0-9!@#$%^&*;:"'/?><.,`~)])*$/;
  return value.trim().match(regexCustomName);
});

jQuery.validator.addMethod('notBlank', function (value) {
  let text = $.trim(value).replace(/  +/g, ' ');
  let lengthOfText = text.length;
  let lengthOfValue = value.length;
  return lengthOfText === lengthOfValue;
});

jQuery.validator.addMethod('notBlankContent', function (value) {
  let text = $.trim(value);
  let lengthOfText = text.length;
  if (lengthOfText <= 0) {
    return false;
  }
  return true;
});

jQuery.validator.addMethod("noWhitespace", function (value, element) {
  return /^\S(.*\S)?$/.test(value);
});

jQuery.validator.addMethod('userName', function (value) {
  let text = $.trim(value).replace(/ +/g, '');
  let lengthOfText = text.length;
  let lengthOfValue = value.length;
  return lengthOfText === lengthOfValue;
});

jQuery.validator.addMethod("complexPassword", function (value, element) {
  return /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[-+_!#$%^&*@,?<>])(?!.*[\(\)]).{8,32}$/.test(value);
});

jQuery.validator.addMethod('slug', function (value) {
  let regexSlug = /^[A-Za-z0-9\d-]+$/;
  return value.trim().match(regexSlug);
});

jQuery.validator.addMethod('url', function (value) {
  let regexUrl = /^$|^\S+$/;
  return value.trim().match(regexUrl);
});
