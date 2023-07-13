<div class="process-status-message">
    <div class="success-message update-message">
        <span class="material-symbols-outlined close">
            close
        </span>
        <span class="material-symbols-outlined success">
            mood
        </span>
        <div class="texts">
            <h4>
                Success!
            </h4>
            <p>
                <?php echo $successMessage; ?>
            </p>
        </div>
    </div>

    <div class="error-message update-message">
        <span class="material-symbols-outlined close">
            close
        </span>
        <span class="material-symbols-outlined error">
            mood_bad
        </span>
        <div class="texts">
            <h4>
                Error!
            </h4>
            <p>
                <?php echo $failMessage; ?>
            </p>
        </div>
    </div>
</div>