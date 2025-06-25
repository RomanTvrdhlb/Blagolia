import {getAjaxData} from "../functions/ajax-get-data";
import {modalManagerObject} from "./modals";

document.addEventListener('DOMContentLoaded', () => {
    const {ajax_url, once} = ajax_params;
    const form = document.querySelector('.js-comment-form');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const button = form.querySelector('button[type="submit"]');
        button.disabled = true;

        const params = {
            comment_post_ID: form.querySelector('[name="comment_post_ID"]').value,
            comment: form.querySelector('#comment').value,
            author: form.querySelector('#author').value,
            email: form.querySelector('#email').value,
            nonce: once,
        };

        getAjaxData(ajax_url, 'submit_comment_ajax', params, (response) => {
            if (response.success) {
                form.reset();

                modalManagerObject.openModal(`modal_265`);
            } else {
                alert('Ошибка: ' + (response.data?.message || 'Неизвестно'));
            }
            button.disabled = false;
        }, () => {
            alert('Ошибка соединения');
            button.disabled = false;
        });
    });
});
