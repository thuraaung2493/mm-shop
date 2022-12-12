import "./bootstrap";

import { showModal } from "./modal";

$(function () {
  let form = null;
  let url = null;

  function addListeners(selector, callback) {
    $(selector).each(function () {
      $(this).click(function (e) {
        e.preventDefault();
        callback.apply(this);
      });
    });
  }

  addListeners(".deleteBtn", function () {
    form = $(`#delete-form-${this.dataset.id}`);
    showModal();
  });

  addListeners(".activateBtn", function () {
    url = this.dataset.url;
    showModal("activateModal");
  });

  addListeners(".deactivateBtn", function () {
    url = this.dataset.url;
    showModal("deactivateModal");
  });

  $("#confirm")?.click(function () {
    if (form) form.submit();
  });

  addListeners(".confirmBtn", function () {
    if (url) window.location.replace(url);
  });

  $(".multiSelect").select2();
});
