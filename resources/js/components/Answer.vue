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
                this.$toast.success(res.data.message, 'Success', {timeoute: 3000});
            })
            .catch(err => {
                this.$toast.error(err.response.data.message, 'Error', {timeoute: 3000});
            });
        },

        destroy () {
            if(confirm("Are you sure ?")){
                axios.delete(this.endpiont)
                .then(res => {
                    $(this.$el).fadeOut(500, ()=>{
                        this.$toast.success(res.data.message, 'success', {timeoute: 3000});
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