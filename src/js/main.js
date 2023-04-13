
const { createApp } = Vue;

createApp({
    data() {
        return {

            apiUrl: 'server.php',
            todoss:[]
            /* todoss: [
                {
                    "text": "HTML",
                    "done": true
                },
                {
                    "text": "CSS",
                    "done": true
                },
                {
                    "text": "Responsive design",
                    "done": true
                },
                {
                    "text": "Javascript",
                    "done": true
                },
                {
                    "text": "PHP",
                    "done": true
                },
                {
                    "text": "Laravel",
                    "done": false
                }
            ], */
        }
    },
    methods: {
        getTodoss(){

            //è una chiamata ASINCRONA quindi dobbiamo dirgli: quando riceverai una risposta, gestiscila.
            //essendo arrow function il contesto sarà lo stesso della nostra applicazione
            axios.get(this.apiUrl).then((response) =>{
                console.log(response);
                this.todoss = response.data
            })
        }
    },
    created(){

        //leggiamo i todoss
        this.getTodoss();
    }
}).mount('#app');