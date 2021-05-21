(function() {
    $.get('/api/me', (resp) => {
        window._user = {
            logged_in: true,
            username: resp.username,
            challenge_idx: resp.challenge_idx
        }

        $('.user-state').css('display', 'block');
        $('.user-state .username').text(`Logged in as: ${resp.username}`);
        $('.user-state').click(() => {
            $.post('/api/logout', {}, (resp) => {
                window.location.reload();
            });
        });

        const sections = $('section');

        const challengeCount = $('a.chlg-start-btn').length;

        for (var i = 0; i < challengeCount; i++) {
            const btn = $($('a.chlg-start-btn')[i]);

            if (btn.data('chid') > resp.challenge_idx) {
                btn.click((e) => {
                    e.preventDefault();

                    if (btn.attr('disabled')) return;
                    
                    btn.attr('disabled', 'disabled');

                    const btnText = btn.text();
                    btn.text(`Please complete challenge ${resp.challenge_idx + 1} first`);

                    setTimeout(() => {
                        btn.text(btnText);
                    
                        btn.removeAttr('disabled');
                    }, 3000);
                })
            }
        }
    }).catch(() => {
        window._user = {
            logged_in: false
        }

        $('.user-state').css('display', 'block');
        $('.user-state .username').text(`Click to login`);
        $('.user-state .logout').text(`Click to login`);
        $('.user-state').click(() => {
            window.location.href = '/login';
        });

        $('a.chlg-start-btn').click((e) => {
            e.preventDefault();

            window.location.href = `/login?ref=${encodeURIComponent(e.currentTarget.href)}`;
        });
    });
})();