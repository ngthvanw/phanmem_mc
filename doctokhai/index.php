<form action="upload.php" method="post" enctype="multipart/form-data" id="uploadForm">
    <label for="files">📂 Chọn tệp XML:</label>
    <input type="file" name="files[]" id="files" multiple accept=".xml">
    <button type="submit">⬆️ Tải lên</button>
</form>
<style>
	/* Định dạng form */
	#uploadForm {
		width: 400px;
		padding: 20px;
		background: #f8f9fa;
		border-radius: 10px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		text-align: center;
		margin: 20px auto;
	}

	/* Label */
	#uploadForm label {
		font-size: 16px;
		font-weight: bold;
		display: block;
		margin-bottom: 10px;
	}

	/* Input file */
	#uploadForm input[type="file"] {
		width: 100%;
		padding: 10px;
		border: 1px solid #ccc;
		border-radius: 5px;
		background: white;
	}

	/* Nút tải lên */
	#uploadForm button {
		background-color: #007bff;
		color: white;
		border: none;
		padding: 10px 20px;
		border-radius: 5px;
		font-size: 16px;
		cursor: pointer;
		margin-top: 15px;
		transition: 0.3s;
	}

	/* Hover nút */
	#uploadForm button:hover {
		background-color: #0056b3;
	}
</style>
