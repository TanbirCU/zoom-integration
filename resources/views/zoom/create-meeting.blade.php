<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Zoom Meeting</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Create a Zoom Meeting</h1>

        <div class="card shadow">
            <div class="card-body">
                <form action="/zoom/create-meeting" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="topic" class="form-label">Meeting Topic</label>
                        <input type="text" id="topic" name="topic" class="form-control" placeholder="Enter meeting topic" required>
                    </div>

                    <div class="mb-3">
                        <label for="start_time" class="form-label">Start Time</label>
                        <input type="datetime-local" id="start_time" name="start_time" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration (in minutes)</label>
                        <input type="number" id="duration" name="duration" class="form-control" placeholder="Enter meeting duration" required>
                    </div>

                    <div class="mb-3">
                        <label for="timezone" class="form-label">Time Zone</label>
                        <select id="timezone" name="timezone" class="form-select" required>
                            <option value="UTC" selected>UTC</option>
                            <option value="America/New_York">America/New_York</option>
                            <option value="America/Los_Angeles">America/Los_Angeles</option>
                            <option value="Asia/Kolkata">Asia/Kolkata</option>
                            <option value="Europe/London">Europe/London</option>
                            <!-- Add more time zones as needed -->
                        </select>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" id="host_video" name="host_video" class="form-check-input" value="1">
                        <label for="host_video" class="form-check-label">Enable Host Video</label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" id="participant_video" name="participant_video" class="form-check-input" value="1">
                        <label for="participant_video" class="form-check-label">Enable Participant Video</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Create Meeting</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
