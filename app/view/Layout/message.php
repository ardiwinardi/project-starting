<?php

if (!empty($success)){
	echo "<script>
			var notice = new PNotify({
				title: 'Sukses',
				text: '{$success}',
				type: 'success',
				addclass: 'custom',
				nonblock: {
					nonblock: true
				}
			});
			notice.get().click(function() {
				notice.remove();
			});
	</script>";
}

if (!empty($error)){
	echo "<script>
			var notice = new PNotify({
				title: 'Error',
				text: '{$error}',
				type: 'warning',
				addclass: 'custom',
				nonblock: {
					nonblock: true
				}
			});
			notice.get().click(function() {
				notice.remove();
			});
	</script>";
}
?>
