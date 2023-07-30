console.log('test');

document.getElementById('heartIcon').addEventListener('click', function() {
    console.log("clicked");
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'components/likes.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Update the UI with the new likes count
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                const likesCount = document.getElementById('likesCount');
                likesCount.textContent = response.likes;
            } else {
                console.error(response.message);
            }
        } else {
            console.error('Error: ' + xhr.status);
        }
    };
    const store_id = document.getElementById('store_id').textContent.trim();
    xhr.send("store_id=" + encodeURIComponent(store_id)); // Add encodeURIComponent here
    console.log(encodeURIComponent(store_id))
});

// console.log('test');

// document.getElementById('heartIcon').addEventListener('click', function() {
//     console.log("clicked");
//     const xhr = new XMLHttpRequest();
//     xhr.open('POST', 'database/db-likes.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.onload = function() {
//         if (xhr.status === 200) {
//             // Output the response received from the server
//             console.log(xhr.responseText);

//             // Update the UI with the new likes count
//             const response = JSON.parse(xhr.responseText);
//             if (response.success) {
//                 const likesCount = document.getElementById('likesCount');
//                 likesCount.textContent = response.likes;
//             } else {
//                 console.error(response.message);
//             }
//         } else {
//             console.error('Error: ' + xhr.status);
//         }
//     };
//     const store_id = document.getElementById('store_id').textContent.trim();
//     xhr.send("store_id=" + encodeURIComponent(store_id)); // Add encodeURIComponent here
//     console.log(encodeURIComponent(store_id))
// });

