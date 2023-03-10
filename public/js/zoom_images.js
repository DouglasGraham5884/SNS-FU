"use strict";

{

    const open = document.getElementById("open");
    const close = document.getElementById("close");
    const header_overlay = document.querySelector(".header-overlay");
    const overlay = document.querySelector(".overlay");
    const post_imgs = document.querySelectorAll(".post-img");
    const post_img_descs = document.querySelectorAll(".post-img-desc");

    let img_arr = [];

    for(let i = 1; i <= post_imgs.length; i++) {
        img_arr.push({name: `img${i}`, element: document.querySelector(`.img${i}`)});
    }

    for(let i = 1; i <= post_imgs.length; i++) {
        const img = document.querySelector(`.img${i}`);
        const desc = document.querySelector(`.desc${i}`);
        img.addEventListener("click", () => {
            desc.classList.add("active");
        })
    }
    
    // for(let i = 0; i <= post_imgs.length; ++i) {
    // }
    
    // function KeyEvent(e) {
    //     if(e.keyCode == 27) {
    //         overlay.classList.remove("show");
    //         post_imgs.forEach((img) => {
    //             img.classList.remove("zoom");
    //         });
    //     }
    // }

    open.addEventListener("click", () => {
        header_overlay.classList.add("show");
        open.classList.add("hide");
    });

    // post_img.addEventListener("click", () => {
    //     overlay.classList.add("show");
    //     open.classList.add("hide");
    // });

    // close.addEventListener("click", () => {
    //     overlay.classList.remove("show");
    //     open.classList.remove("hide");
    // });

    // 画像をクリックすると拡大表示
    post_imgs.forEach((img) => {
        img.addEventListener("click", () => {
            overlay.classList.add("show");
            img.classList.add("zoom");
            open.classList.add("hide");
        });
    });

    // ×ボタンで拡大解除
    close.addEventListener("click", () => {
        header_overlay.classList.remove("show");
        overlay.classList.remove("show");
        post_imgs.forEach((img) => {
            img.classList.remove("zoom");
        });
        post_img_descs.forEach((desc) => {
            desc.classList.remove("active");
        });
        open.classList.remove("hide");
    });

    // 画像以外の場所クリックでも拡大解除
    overlay.addEventListener("click", () => {
        overlay.classList.remove("show");
        post_imgs.forEach((img) => {
            img.classList.remove("zoom");
        });
        post_img_descs.forEach((desc) => {
            desc.classList.remove("active");
        });
        open.classList.remove("hide");
    });

    // header_overlay用
    header_overlay.addEventListener("click", () => {
        header_overlay.classList.remove("show");
        open.classList.remove("hide");
    });
    
    // Escキーでも拡大解除
    document.addEventListener("keydown", e => {
        if(e.keyCode == 27) {
            header_overlay.classList.remove("show");
            overlay.classList.remove("show");
            post_imgs.forEach((img) => {
                img.classList.remove("zoom");
            });
            post_img_descs.forEach((desc) => {
                desc.classList.remove("active");
            });
            open.classList.remove("hide");
        }
    });

}