/* The chat const defines the Peekobot conversation.
 * 
 * It should be an object with numerical property names, and each property is an entry
 * in the conversation.
 * 
 * A conversation entry should have:
 *  - A "text" property that is what the chatbot says at this point in the conversation
 *  - Either:
 *     - A "next" property, which defines the next chat entry by stating a numerical key
 *       of the chat object and is used when the chatbot needs to say several things
 *       without input from the user
 *    OR
 *     - An "options" property that defines the choices a user can take this is an
 *       array of option objects
 * 
 * An options object should have:
 *  - a "text" property that is the label for the user's choice
 *  AND EITHER
 *  - a "next" property that defines the next chat entry by stating a numerical key of
 *    the chat object and is used when the user selects this option
 *  OR
 *  - a "url" property that defines a link for the user to be taken to
 * 
 * A simple example chat object is:
 * const chat = {
 *     1: {
 *         text: 'Good morning sir',
 *         next: 2
 *     },
 *     2: {
 *         text: 'Would you like tea or coffee with your breakfast?',
 *         options: [
 *             {
 *                 text: 'Tea',
 *                 next: 3
 *             },
 *             {
 *                 text: 'Coffee',
 *                 next: 4
 *             }
 *         ]
 *     },
 *     3: {
 *         text: 'Splendid - a fine drink if I do say so myself.'
 *     },
 *     4: {
 *         text: 'As you wish, sir'
 *     }
 * }
 */
/* http://127.0.0.1:5500/docs/index.html?id=12345678910
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const product = urlParams.get('id')
console.log(product);
*/
function sendSMS(){
    location.href = "sms.php";
}
 const chat = {
    1: {
        text: 'Bem-vindo(a) ao <strong>TrackMoney</strong> Negociações Online. Precisa de ajuda?',
        options: [
            {
                text: 'Consultar débito',
                next: 2
            }
        ]
    },
    2: {
        text: 'Por favor, aguarde... estou procesando a sua solicitação.',
        next: 3
    },
    3: {
        text: 'Tudo certo! Encontrei débitos pendentes em seu nome. Você gostaria de regularizar a sua situação conosco?',
        options: [
            {
                text: "<b>Sim</b>",
                next: 4
            },
            {
                text: "<b>Não</b>, uma outra hora",
                next: 5
            }
        ]
    },
    4: {
        text: 'Maravilha! <a href="javascript:void(0)" onclick="sendSMS();">Clique aqui</a> para concluir a sua solicitação e obrigado 🤗',
    },
    5: {
        text: 'Aah, você está perdendo!',
        next: 6
    },
    6: {
        text: 'Você pode negociar seus débitos com condições especiais de pagamento. Posso encaminhar um e-mail com mais informações?',
        options: [
            {
                text: "<b>Sim</b>",
                next: 7
            },
            {
                text: "<b>Não</b>, obrigado",
                next: 8
            }
        ]
    },
    7: {
        text: 'Maravilha! <a href="javascript:void(0)" onclick="sendSMS();">Clique aqui</a> para concluir a sua solicitação e obrigado 🤗',
    },
    8 : {
        text: 'Perfeito! Lembre-se, garantimos sempre as melhores taxas para você 🤗',
    }
};
