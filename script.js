var copy = document.querySelector('.copy');
copy.addEventListener('click', copyToClipboard);

function copyToClipboard() {
  var el = document.createElement('textarea');

  var selected = document.getSelection().rangeCount > 0
    ? document.getSelection().getRangeAt(0)
    : false;

  el.value = document.querySelector('.output').innerHTML;
  el.setAttribute('readonly', '');
  el.style.position = 'absolute';
  el.style.left = '-9999px';
  document.body.appendChild(el);

  el.select();
  document.execCommand('copy');
  document.body.removeChild(el);
  if (selected) {
    document.getSelection().removeAllRanges();
    document.getSelection().addRange(seleceted);
  }

  alert('Feed Copied to Clipboard.')
}
