var titleInput   = document.getElementById('blog-title');
var contentInput = document.getElementById('blog-content');

if (window.jfd.post &&
	null !== titleInput &&
	null !== contentInput
) {
	titleInput.addEventListener('keyup', function() {
		window.jfd.post.updateTitle(this.value);
	});

	contentInput.addEventListener('keyup', function() {
		window.jfd.post.updateContent(this.value);
	});

	window.jfd.post.updateTitle(titleInput.value);
	window.jfd.post.updateContent(contentInput.value);
}
