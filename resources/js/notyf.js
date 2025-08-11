import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';

// Инициализация Notyf
const notyf = new Notyf({
    duration: 5000,
    position: {
        x: 'right',
        y: 'top',
    },
    types: [
        {
            type: 'warning',
            background: 'orange',
            icon: {
                className: 'material-icons',
                tagName: 'i',
                text: 'warning'
            }
        },
        {
            type: 'info',
            background: 'blue',
            icon: {
                className: 'material-icons',
                tagName: 'i',
                text: 'info'
            }
        }
    ]
});

// Экспортируем для использования в других файлах
window.notyf = notyf;

// Обработчик для Flash сообщений из Laravel
document.addEventListener('DOMContentLoaded', () => {
    if (window.laravelFlash) {
        Object.entries(window.laravelFlash).forEach(([type, messages]) => {
            const messagesArray = Array.isArray(messages) ? messages : [messages];

            messagesArray.forEach(message => {
                notyf.open({
                    type,
                    message: String(message)
                });
            });
        });
    }
});

// Обработчик ошибок Axios (опционально)
window.axios.interceptors.response.use(
    response => response,
    error => {
        if (error.response) {
            if (error.response.status === 422) {
                const errors = error.response.data.errors;
                Object.values(errors).forEach(messages => {
                    const messagesArray = Array.isArray(messages) ? messages : [messages];
                    messagesArray.forEach(message => {
                        notyf.error(message);
                    });
                });
            } else if (error.response.status >= 500) {
                notyf.error('Произошла серверная ошибка');
            } else if (error.response.data.message) {
                notyf.error(error.response.data.message);
            }
        } else {
            notyf.error('Ошибка сети или сервер не отвечает');
        }

        return Promise.reject(error);
    }
);
