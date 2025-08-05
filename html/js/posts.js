// 投稿を編集状態にする
const editPost = (self) => {
    const post_object = self.parentNode.parentNode;
    post_object.querySelector('.post-name').classList.remove('post-not-edit-input');
    post_object.querySelector('.post-name').readOnly = false;
    post_object.querySelector('.post-text').classList.remove('post-not-edit-textarea');
    post_object.querySelector('.post-text').readOnly = false;
    post_object.querySelector('.edit-btn').innerHTML = '✒️保存する';
    post_object.querySelector('.edit-btn').setAttribute("onclick", `updatePost(this);`);
}

// Ajaxで投稿を更新する
const updatePost = (self) => {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/Post/edit');
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
    // 更新後の投稿情報を取得
    const post_object = self.parentNode.parentNode;
    const name = post_object.querySelector('.post-name').value;
    const message = post_object.querySelector('.post-text').value;
    // AjaxでPost
    xhr.send(`id=${post_object.dataset.id}&name=${name}&message=${message}`);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            alert(xhr.responseText);
            // 編集状態を解除する
            post_object.querySelector('.post-name').classList.add('post-not-edit-input');
            post_object.querySelector('.post-name').readOnly = true;
            post_object.querySelector('.post-text').classList.add('post-not-edit-textarea');
            post_object.querySelector('.post-text').readOnly = true;
            post_object.querySelector('.edit-btn').innerHTML = '✒️編集';
            post_object.querySelector('.edit-btn').setAttribute("onclick", `editPost(this);`);
        }
    }
}

// Ajaxでいいねを追加する
const goodPost = (self) => {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/Post/favorite');
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
    // 更新後の投稿情報を取得
    const post_object = self.parentNode.parentNode;
    // AjaxでPost
    xhr.send(`id=${post_object.dataset.id}`);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // alert(xhr.responseText);
            // いいね数を更新
            const favoriteCount = post_object.querySelector('.favorite-count');
            // alert(favoriteCount);
            let currentCount = parseInt(favoriteCount.textContent);
            favoriteCount.textContent = currentCount + 1;
        }
    }
}



// Ajaxで投稿を削除する
const deletePost = (self) => {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/Post/delete');
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
    // 更新後の投稿情報を取得
    const post_object = self.parentNode.parentNode;
    // AjaxでPost
    xhr.send(`id=${post_object.dataset.id}`);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            alert(xhr.responseText);
            post_object.parentNode.remove();
        }
    }
}