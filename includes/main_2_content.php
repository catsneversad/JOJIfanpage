<section id="section-6" class = "commentPart">
    <div class="commentPartContent">
        <p>Leave some comment for JOJI</p>
        <textarea id='output' rows="10" cols="45" name="text" onfocus="clearContents(this);" placeholder="Your comment..."></textarea>
        <input type="button" class="btn" value="send" onclick="javascript:eraseText();">
    </div>
    <script type="text/javascript">
        function eraseText() {
            document.getElementById("output").value = "";
        }
    </script>
</section>