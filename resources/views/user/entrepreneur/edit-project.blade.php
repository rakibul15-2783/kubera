<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kubera</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    @include('user.dashboard')
    <div class="container">
        <h2 class="text-center">Edit Project</h2>
        <div class="row">
            <div class=" card col-lg-6 offset-lg-3">
                <form action="{{ route('update.project',['id' => $project->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group ">
                            <label for="project_title">Project Title</label><br>
                            <input type="text" class="form-control" value="{{ $project->projectDetails->project_title }}" name="project_title" id="project_title" required>
                        </div>
                        @error('project_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="project_category">Project Category</label><br>
                            <input type="text" class="form-control" value="{{ $project->projectDetails->project_category }}" name="project_category" id="project_category" required>
                        </div>
                        @error('project_category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="description">Description</label><br>
                            <textarea name="description" class="form-control" id="description" rows="5" required>{{ $project->projectDetails->description }}</textarea>
                        </div>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="current_status">Current Status</label><br>
                            <select name="current_status" id="current_status" class="form-control" required>
                                <option value="">-----select-----</option>
                                <option value="0" {{ $project->projectDetails->current_status == 0 ? 'selected' : '' }}>Planning</option>
                                <option value="1" {{ $project->projectDetails->current_status == 1 ? 'selected' : '' }}>Processing</option>
                            </select>
                        </div>
                        @error('current_status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="estimate_budget">Estimate Budget</label><br>
                            <input type="number" class="form-control" value="{{ $project->projectDetails->estimate_budget }}" name="estimate_budget" id="estimate_budget" step="0.01" required>
                        </div>
                        @error('estimate_budget')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror<br>
                        <div class="form-group">
                            <label for="is_donated">If Someone is Donated?</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_donated" id="donated_yes" value="1" {{ $project->projectDetails->is_donated == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="donated_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_donated" id="donated_no" value="0" {{ $project->projectDetails->is_donated == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="donated_no">No</label>
                            </div>
                        </div>
                        @error('is_donated')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror<br>
                        <div class="form-group">
                            <label for="donation_amount">Donation Amount</label><br>
                            <input type="number" class="form-control" value="{{ $project->projectDetails->donation_amount }}" name="donation_amount" id="donation_amount" step="0.01">
                        </div>
                        @error('donation_amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="prcentage_of_completion">Percentage of Completion</label><br>
                            <input type="number" class="form-control" value="{{ $project->projectDetails->prcentage_of_completion }}" name="prcentage_of_completion" id="prcentage_of_completion" required>
                        </div>
                        @error('prcentage_of_completion')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="team_members">Team Members</label><br>
                            <input type="text" class="form-control" value="{{ $project->projectDetails->team_members }}" name="team_members" id="team_members" required>
                        </div>
                        @error('team_members')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="your_role">Your Role</label><br>
                            <input type="text" class="form-control" value="{{ $project->projectDetails->your_role }}" name="your_role" id="your_role" required>
                        </div>
                        @error('your_role')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="document">Document</label><br>
                            <input type="file" class="form-control" name="document" id="document">
                        </div>
                        @error('document')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror<br>

                        <div class="form-group text-center">
                            <button type="submit"  class="btn btn-primary">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
