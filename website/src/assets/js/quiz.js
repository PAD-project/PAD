const ALPHABET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'

window.ctf_quiz = async (challenge_id, challenge_flag) => {
    const quiz_info_res = await fetch(`/api/quiz.php?id=${challenge_id}&flag=${challenge_flag}`);
    const quiz_info = await quiz_info_res.json();

    if (!quiz_info.success) {
        window.last_ctf_error = quiz_info.error;
        return false;
    }

    let selected_value = null;

    Swal.mixin({
        allowOutsideClick: false,
        allowEscapeKey: false
    }).queue([
        {
            title: 'Congratulations, you did it!',
            html: quiz_info.outro,
            confirmButtonText: 'To the quiz &rarr;',
            icon: 'success'
        },
        {
            html: `<p><b>${quiz_info.quiz_vraag}</b></p>` +
            `${quiz_info.antwoorden.map((a, i) => {
                return `<button class="swal-mc-button" data-val="${a}">${ALPHABET[i]}. ${a}</button>`
            }).join('')}`,
            icon: 'question',
            showConfirmButton: false,
            didOpen: () => {
                $('button.swal-mc-button').off('click').on('click', function () {
                    selected_value = this.getAttribute('data-val');
                    Swal.clickConfirm();
                });
            },
            preConfirm: async () => {
                const quiz_post_resp = await fetch(`/api/quiz.php?id=${challenge_id}&flag=${challenge_flag}&answer=${selected_value}`, {
                    method: 'POST'
                });
                const quiz_post = await quiz_post_resp.json();

                if (!quiz_post.success) {
                    let error = 'Placeholder';
                    
                    switch (quiz_post.error) {
                        case 'ERR_ANSWER_INCORRECT':
                            error = 'Oh no, that answer is incorrect!'
                            break;
                        default:
                            error = quiz_post.error;
                    }

                    Swal.showValidationMessage(error);
                }
            }
        }
    ]).then((result) => {
        Swal.fire({
            title: 'Challenge complete',
            text: 'You have completed the challenge and answered the quiz correctly.',
            icon: 'success'
        }).then(() => {
            window.location.href = '/challenges';
        });
    });
}