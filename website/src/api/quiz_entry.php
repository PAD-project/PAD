<?php

require __DIR__ . '/me.php';

function ShowError($error) {
    ?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Error</title>
	        <link rel="stylesheet" href="/assets/css/main.css" />
			<link rel="stylesheet" href="/assets/css/dark.min.css" />
			<script src="/assets/js/sweetalert2.min.js"></script>
		</head>
		<body>
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Unable to start challenge',
					text: '<?= $error ?>',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    confirmButtonText: 'Go back'
				}).then(() => {
                    window.location.href = '/challenges';
                });
			</script>
		</body>
		</html>
	<?php
}

function EnforceChallengeAccess($challenge) {
    $user_info = GetUserInfo();

    if (!$user_info[0]) {
        if ($user_info[1] === 401) {
			http_response_code(401);
            ShowError('You must be logged in to start this challenge');
        } else {
			http_response_code(500);
            ShowError('An unexpected error has occured (' . $user_info[1] . ')');
        }

        exit();
    }

    $user_info = $user_info[1];

    if ($user_info['challenge_idx'] < $challenge) {
		http_response_code(401);
        ShowError('You must finish challenge ' . ($challenge) . ' first before you can start this one');
        exit();
    }
}