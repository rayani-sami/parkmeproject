<!-- Modal -->
<div class="modal fade" id="repondreModal" tabindex="-1" role="dialog" aria-labelledby="repondreModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="repondreModalLabel">Répondre à la demande de <span id="recipientName"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="replyForm">
                    <div class="form-group">
                        <label for="responseMessage">Votre réponse:</label>
                        <textarea class="form-control" id="responseMessage" name="message" rows="3"></textarea>
                    </div>
                    <input type="hidden" id="recipientEmail" name="email">
                    <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" onclick="sendReply()">Envoyer</button>
            </div>
        </div>
    </div>
</div>

<script>
    function sendReply() {
        var name = document.getElementById("recipientName").textContent;
        var email = document.getElementById("recipientEmail").value;
        var message = document.getElementById("responseMessage").value;
        var csrfToken = document.getElementById("csrf_token").value;

        // Send the reply data to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "{{ route('replyToRequest') }}", true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert("Reply sent successfully");
                    $('#repondreModal').modal('hide'); // Close the modal
                } else {
                    alert("Failed to send reply");
                }
            }
        };
        var data = JSON.stringify({ name: name, email: email, message: message });
        xhr.send(data);
    }
</script>
