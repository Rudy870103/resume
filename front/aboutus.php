<style>
    .logo {
        background-image: url(./icon/logo_animate.png);
        background-repeat: no-repeat;
        background-position: center;
        /* background-size: contain; */
        position: relative;
        overflow: hidden;
    }

    .cover {
        animation: cover 40s linear infinite;
        position: absolute;
        left: 10px;
    }

    @keyframes cover {
        from {
            transform: translate(-60%);
        }

        to {
            transform: translate(150%);
        }
    }
</style>
<header style="padding: 80px 0;">
    <h1 style="text-align: center;font-weight:700">品牌起源<span style="display: block;font-size:16px;margin-top:10px">About us</span></h1>
</header>

<main style="width: 80%;height:500px;margin:auto;">
    <div class="logo mb-5" style="height: 500px;">
        <div class="cover"><img src="./icon/cover.png" alt="" height="500px"></div>
    </div>
    <article>
        <div class="text-center">
            <h3 class="text-center" style="display: inline-block;">我們所經歷的每件事，看似毫不相關，但當換個角度看，其實我們正勇往直前</h3>
            <p style="display: inline-block;">—我說的</p>
        </div>

    </article>
    <!-- <article style="width: 80%;margin:auto">
    <p>其實這個主題，是從一堂學習illustor的基礎課程開始的</p>
    </article> -->
</main>