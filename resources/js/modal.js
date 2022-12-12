export const showModal = (modalId = "confirmModal") => {
  $(`#${modalId}`)
    .modal({
      backdrop: "static",
      keyboard: false,
    })
    .show();
};
