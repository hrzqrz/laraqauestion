<script>
export default {
    name: "Answer",
    props:['answer'],

    data () {
        return {
            editing: false,
            body: this.answer.body,
            bodyHtml: this.answer.body_html,
            id: this.answer.id,
            questionId: this.answer.question_id,
            beforeEditChache: null
        }
    },

    methods: {
        edit(){
            this.beforeEditChache = this.body;
            this.editing = true;
        },

        cancel(){
            this.body = this.beforeEditChache;
            this.editing = false;
        },

        updated() {
            axios.patch(this.endpiont,
            {body:this.body}
            )
            .then(res => {
                //console.log('res');
                this.editing = false;
                this.bodyHtml = res.data.body_html;
                alert(res.data.message);
            })
            .catch(err => {
                console.log(err.response)
                console.log('Something went wrong.');
            });
        },

        destroy () {
            if(confirm("Are you sure ?")){
                axios.delete(this.endpiont)
                .then(res => {
                    $(this.$el).fadeOut(500, ()=>{
                        alert(res.data.message)
                    })
                })
            }
        }
    },

    computed: {
        isInvalid(){
            return this.body.length < 10;
        },

        endpiont(){
            return `/questions/${this.questionId}/answers/${this.id}`;
        }
    },
}
</script>