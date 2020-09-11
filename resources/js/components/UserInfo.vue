<template>
    <div>
        <span class="text-muted"> {{ postDate }}</span>
     <!-- $lable ." ". $model->created_date -->
    <div class="media mt-2">
        <a :href="user.url" class="pl-2">
            <!-- $model->user->url -->
            <img :src="user.avatar" alt="">
            <!-- $model->user->avatar -->
        </a>
        <div class="media-body mt-1">
            <a :href="user.url">{{user.name}}</a>
            <!-- $model->user->name -->
            <!-- $model->user->url -->
        </div>
    </div>
    </div>
</template>

<script>
export default {
    props:['model', 'label'],

    computed:{
        postDate () {
            return this.label + " " + this.model.created_date;
        }
    },

    data () {
        return  this.model.user;
    }
}
</script>
