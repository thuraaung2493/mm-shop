import "./bootstrap";

import Element from "./element";
import { showModal } from "./modal";

window.addEventListener("DOMContentLoaded", function () {
  let form = null;
  Element.get(".deleteBtn").forEach(function (ele) {
    ele.addEventListener("click", function (e) {
      e.preventDefault();
      form = Element.findById(`delete-form-${this.dataset.id}`);
      showModal();
    });
  });

  Element.findById("confirm")?.addEventListener("click", function () {
    if (form) {
      form.submit();
    }
  });

  let url;

  function addListeners($className, $modal) {
    Element.get($className).forEach(function (ele) {
      ele.addEventListener("click", function (e) {
        e.preventDefault();
        url = this.dataset.url;
        showModal($modal);
      });
    });
  }

  addListeners(".activateBtn", "activateModal");
  addListeners(".deactivateBtn", "deactivateModal");

  Element.get(".confirmBtn").forEach(function (ele) {
    ele.addEventListener("click", function (e) {
      e.preventDefault();
      if (url) window.location.replace(url);
    });
  });
});
