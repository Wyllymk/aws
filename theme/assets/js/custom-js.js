function toggleFeatured(element, postId, nonce) {
	jQuery.post(
		featuredToggle.ajax_url,
		{
			action: 'toggle_featured',
			post_id: postId,
			nonce: nonce,
		},
		function (response) {
			if (response.success) {
				if (response.data.is_featured) {
					element.classList.remove(
						'dashicons-star-empty',
						'text-gray-400'
					);
					element.classList.add(
						'dashicons-star-filled',
						'text-yellow-400'
					);
				} else {
					element.classList.remove(
						'dashicons-star-filled',
						'text-yellow-400'
					);
					element.classList.add(
						'dashicons-star-empty',
						'text-gray-400'
					);
				}
			} else {
				alert('Error: ' + response.data);
			}
		}
	);
}
