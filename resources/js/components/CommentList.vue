<template>
    <div>
        <label class="block text-left p-2">
            <button @click="addComment" class="text-gray-700 ">
                댓글등록
            </button>
            <textarea
                v-model="newComment"
                class="form-textarea mt-1 block w-full"
                rows="3"
                placeholder="Enter some long form content."
            ></textarea>
        </label>
        <button class="btn btn-default w-full" @click="getComments">
            댓글 불러오기
            <comment-item
                v-for="(comment, index) in comments.data"
                :key="index"
                :comment="comment"
                :loginuserid="loginuserid"/>

        </button>
            <pagination @pageClicked="getPage($event)" v-if="comments.data != null" :links="comments.links" />
        
    </div>
</template>

<script>
import CommentItem from "./CommentItem.vue";
import Pagination from "./pagination.vue";
export default {
    props: ["post", "loginuserid"],
    components: { CommentItem, Pagination },
    data() {
        return {
            comments: [],
            newComment:""
        };
    },
    methods: {
        addComment(){
            if(this.newComment == ''){
                alert('한 글자라도 쓰세요.');
                return;
            }
           axios.post('/posts/' + this.post.id + '/comments/', {'comment': this.newComment})
            .then(response=>{
                console.log(response.data);
                this.getComments();
                this.newComment='';
            })
            .catch(error=>{console.log(error)})
        },
        getPage(url){
        axios.get(url)
                .then(response=>{
                    this.comments = response.data;
                }).catch(error=>{
                    console.log(error);
                })},

        getComments() {
            //this.comments = [
                // "1st comment",
                // "2nd comment",
                // "3rd comment",

                // // 서버에 현재 게시글의 댓글 리스트를 비동기적으로 요청
                // // 즉, axios를 이용해서 요청
                // // 서버가 댓글 리스트를 주면 그놈을 어디에 할당해?
                // // this.comments에 할당.
                axios.get('/posts/' + this.post.id + '/comments/')
                .then(response=>{
                    this.comments = response.data;
                }).catch(error=>{
                    console.log(error);
                })
        }
    }
};
</script>