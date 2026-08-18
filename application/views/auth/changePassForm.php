<form method="post" action="/change-pass">
    <?php if (isset($msg)) : ?>
        <div class="msg"><?= htmlspecialchars($msg); ?></div>
    <?php endif; ?>
    <?php if (isset($error)) : ?>
        <div class="error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <div class="field">
        <h1><?= htmlspecialchars($user->login); ?></h1>
        <label for="oldPassword">Old password</label>
        <input

            name="oldPassword"
            id="oldPassword"
        >
    </div>

    <div class="field">
        <label for="newPassword">New password</label>
        <input

            name="newPassword"
            id="newPassword"
        >
    </div>

    <button type="submit">Change password</button>
</form>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        width: 500px;
        border: 1px solid black;
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 10px;
    }

    .field {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .field input {
        width: 100%;
    }

    .msg {
        color: aquamarine;
    }

    .error {
        color: red;
    }
</style><?php
