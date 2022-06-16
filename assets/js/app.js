// Block UI

function blockUi(id) {

  if (!id) { return; }

  const blockUiElement = document.querySelectorAll(`[data-block-id=${id}]`);

  blockUiElement.forEach((element) => {
    element.dataset.blockUiState = 'loading';
  });

}

function unblockUi(id) {

  if (!id) { return; }

  const blockUiElement = document.querySelectorAll(`[data-block-id=${id}]`);

  blockUiElement.forEach((element) => {
    delete element.dataset.blockUiState;
  });

}