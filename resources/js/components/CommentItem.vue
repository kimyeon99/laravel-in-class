<template>
    <div>
        <!-- component -->
        <div class="antialiased mx-auto w-full">
            <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>

            <div class="space-y-4">
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <img
                            class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10"
                            src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                            alt=""/>
                    </div>
                    <div
                        class="flex-1 border rounded-lg px-4 py-2 w-full sm:px-6 sm:py-4 leading-relaxed">
                        <strong>{{ comment.user.name }}</strong>
                        <span class="text-xs text-gray-400">3:34 PM</span>
                        <p class="text-sm"> {{ comment.comment }}  </p>
                        
                    </div>
                </div>
                    </div>
                </div>
            </div>
</template>
<script>
export default {
    props: ["comment"],
    // data() {
    //     return {
    //         comment: '',
    //     }
    // },
    // methods:{
    //     update(){
    //         axios.patch('/posts/comments/'+this.comment.id, {
    //             'comments':this.comment.comment
    //         }).then(response =>{
    //             this.comment = response.data;
    //         })
    //     },
    //     delete(){
    //         axios.delete('/posts/comments/'+this.comment.id).then(response=>{
    //             // comments 다시 읽어오기
    //             // 부모에게 알려서 다시 읽어오라고 해야겠다.
    //         }).catch();
    //     }
    // }

};
</script>