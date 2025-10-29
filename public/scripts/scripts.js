up_btn.addEventListener('click', (e)=>{
    change_rate_fetch(e);
})

down_btn.addEventListener('click', (e)=>{
    change_rate_fetch(e);
})

function change_rate_fetch(e){
    e.preventDefault();

    let post_id = +e.target.dataset.postId;
    let action = false;

    if(e.target.id == "up_btn") action = 1
    else if(e.target.id == "down_btn") action = -1

    if(post_id && action){
        fetch('posts',{
            method: "PATCH",
            body: JSON.stringify({
                'action' : action,
                'post_id': post_id
            })
        })
        .then((response)=>response.text())
        .then((rate)=> {
            rate_p.innerHTML = rate;
        })
    }
}