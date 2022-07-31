var reply = document.getElementsByClassName("reply-js")  // all reply buttons in HTML-Collection
var replyArr = [].slice.call(reply); // HTML-Collection to Array

const creator = function(event) { // creator fxn to create a create comment dialoge
    event.preventDefault();
    event.stopPropagation();
    const btn = event.target;
    const commentBlock = btn.parentElement.parentElement;
    const commentId  = btn.parentElement.parentElement.parentElement.id;


    var deletable = document.getElementById("holder-js");
    if(deletable){
        deletable.remove()
    }
    
    if(!btn.classList.contains("psudo-delete")){
        const addCommentBlock = 
        '<div id="holder-js">'+
        '<div class="dividerHeading">'+
        '<h4><span>Comment to '+ commentBlock.children[0].innerHTML +'</span></h4>'+
        '</div>'+

        '<div class="comment_form">'+
        '<div class="row">'+
            '<div class="col-sm-4">'+
                '<input class="col-lg-4 col-md-4 form-control non-close" name="name" type="text" id="c-name" size="30"  onfocus="if(this.value == \'Name\') { this.value = \'\'; }" onblur="if(this.value == \'\') { this.value = \'Name\'; }" value="Name" placeholder="Name*" >'+
            '</div>'+
            '<div class="col-sm-4">'+
                '<input class="col-lg-4 col-md-4 form-control non-close" name="email" type="text" id="c-email" size="30" onfocus="if(this.value == \'E-mail\') { this.value = \'\'; }" onblur="if(this.value == \'\') { this.value = \'E-mail\'; }" value="E-mail" placeholder="E-mail*">'+
            '</div>'+
            '<div class="col-sm-4">'+
                '<input class="col-lg-4 col-md-4 form-control non-close" name="url" type="text" id="c-url" size="30" onfocus="if(this.value == \'Url\') { this.value = \'\'; }" onblur="if(this.value == \'\') { this.value = \'Url\'; }" value="Url" placeholder="Url">'+
            '</div>'+
        '</div>'+
        '</div>'+
        '<div class="comment-box row">'+
            '<div class="col-sm-12">'+
                '<p>'+
                    '<textarea name="comments" class="form-control non-close" rows="6" cols="40" id="c-comments" onfocus="if(this.value == \'Message\') { this.value = \'\'; }" onblur="if(this.value == \'\') { this.value = \'Message\'; }" placeholder="Message">Message</textarea>'+
                '</p>'+
            '</div>'+
        '</div>'+
        '<a id ="oreo" style="margin-bottom:30px" class="btn btn-lg btn-default non-close" >Post Comment</a></div>';
        commentBlock.insertAdjacentHTML("afterend",addCommentBlock)

        document.getElementById('oreo').addEventListener('click',event=>{
            event.stopPropagation()
            event.preventDefault()

            let d = new Date();
            let date = String(d).split(" ").slice(1,4)
            date[0] +=" "
            date[1] +=","
            date = date.join("")


            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const blog_id = urlParams.get('blog_id')
            // let params = (new URL(url)).searchParams;
            // const blog_id = params.get("blog_id");
            console.log(commentId)
            fetch("fetchAccept.php",{
                "method":"POST",
                "body":JSON.stringify({
                    "blog-id":blog_id,
                    "parent-id":commentId,
                    "name":document.getElementById("c-name").value,
                    "date":date,
                    "comment":document.getElementById("c-comments").value
                }),
                "headers":{
                    "Content-Type":"application/json"
                }
            });
            var deletable = document.getElementById("holder-js");
            if(deletable){
                deletable.remove()
            }

        })

        btn.classList.add("psudo-delete")
        
        var commentBox = document.getElementById("holder-js");
        commentBox.addEventListener("click",event=>event.stopPropagation())
        
    }else{
        btn.classList.remove("psudo-delete")
    }
    
}

replyArr.forEach(element => { // assigning event listener to all reply array elements 
    element.addEventListener("click",event=>creator(event))
});









const body = document.querySelector("body")
body.addEventListener("click",(event)=>{   
    var deletable = document.getElementById("holder-js");
    if(deletable){
        deletable.remove()
    }
})

// var reply = document.getElementById("asc");
// reply.addEventListener("onclick",(event)=>{
//     event.preventDefault();
//     const btn = event.target.id;
//     console.log(btn)
// })