<template>
    <div>
        <button @click="getComments" class = "btn btn-default">댓글 불러오기</button>
        <comment-list v-for="(comment, index) in comments" :key="index" :comments="comment"/>
        댓글리스트
    </div>
</template>

<script>
import CommentItem from './CommentItem.Vue';
export default {
    props: ['post', 'loginUserId'],
    components: {CommentItem},
    data(){
        return {
            comments : [],
        }
    },
    methods: {
        getComments() {
            this.comments=[
                '1st comment' , '2nd comment'
            ]
        }
    },
}
</script>