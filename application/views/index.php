<div class="u-info">
    <h1><?= htmlspecialchars($user->login); ?></h1>
    <a href="/change-pass">Change Password</a>
    <div class="counter"><?= htmlspecialchars($user->counter); ?></div>
    <button id="inc">Inc Counter</button>
    <form action="/logout" method="post">
        <button type="submit">Logout</button>
    </form>
    <form action='/reset' method='post'>
        <button>Reset the counter</button>
    </form>
</div>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .u-info {
        width: 500px;
        border: 1px solid black;
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 10px;
    }

    .counter {
        font-size: 25px;
        color: red;
        text-align: center;
    }
    #inc {
        background-color: lightblue;
        color: white;
    }
</style>

<script>
    window.addEventListener("DOMContentLoaded", () => {
        document.getElementById("inc").addEventListener("click", () => {
            fetch("/inc", {
                method: "POST",
                credentials: "include"
            }).then(
                r => {
                    if (!r.ok) {
                        throw new Error("Request failed");
                    }

                    return r.json();
                }
            ).then(
                (d) => {
                    document.querySelector(".counter").innerHTML = d.counter;
                }
            )
        })
    })
</script>