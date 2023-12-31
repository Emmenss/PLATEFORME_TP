<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meeting</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            /*background-color: #f8f9fa;*/
            background-color:purple;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main-content {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        button {
            background-color: #4caf50;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    
    <div class="main-content">
        <h1>Edit Meeting</h1>
        <form action="{{ route('meeting.update', $meeting->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{ $meeting->title }}" required>
            </div>

            <div class="form-group">
                <label for="participants">Number of Participants:</label>
                <input type="number" name="participants" value="{{ $meeting->participants }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description">{{ $meeting->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="datetime-local" name="start_date" value="{{ $meeting->start_date }}" required>
            </div>

            <button type="submit">Save Changes</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <!-- Footer content here -->
    </footer>
</body>

</html>
