<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

    /* font-family: 'Poppins', sans-serif; */


    .btn {
        position: relative;
        padding: 20px 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.5);
        /* margin: 40px; */
        text-decoration: none;
        transition: 1s;
        border-radius: 4px;
        overflow: hidden;
        -webkit-box-reflect: below 1px linear-gradient(transparent, transparent, #0004);
    }

    .btn:hover {
        background: var(--clr);
        box-shadow: 0 0 10px var(--clr),
            0 0 30px var(--clr),
            0 0 60px var(--clr),
            0 0 100px var(--clr);
    }
</style>
<div class="w-auto">
    <a href="{{ route('home.shopper.notification') }}" class="btn" style="--clr:#fffb22;--1:0;"><span>Join
            Now</span></a>
</div>
