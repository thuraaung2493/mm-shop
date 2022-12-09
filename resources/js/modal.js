export const showModal = (modalId = "confirmModal") => {
  console.log("show modal");
  $(`#${modalId}`)
    .modal({
      backdrop: "static",
      keyboard: false,
    })
    .show();
};
