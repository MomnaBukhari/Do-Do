@extends('mainlayout')
@section('title') Help @endsection

@section('content')
<style>
    .accordion-container {
        max-width: 800px;
        margin: auto;
    }

    .accordion {
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 10px;
        transition: 0.4s;
        padding: 18px;
        cursor: pointer;
        text-align: left;
        outline: none;
        font-size: 15px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .accordion:hover, .active {
        background-color: #e2e2e2;
    }

    .accordion:after {
        content: '\002B';
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2212";
    }

    .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
        border-left: 5px solid #053b92;
        border-radius: 0 0 5px 5px;
    }

    .panel p {
        margin: 15px 0;
    }
</style>

<div class="accordion-container">
    <h1 style="overflow-y: hidden; padding:2%;">Help & FAQ</h1>
    <button class="accordion">What is this application about?</button>
    <div class="panel">
        <p>This application is a comprehensive task management tool designed to help you organize your tasks, set priorities, and track your progress.</p>
    </div>

    <button class="accordion">How do I register?</button>
    <div class="panel">
        <p>You can register by clicking on the "Register" link in the navigation bar and filling out the registration form with your details.</p>
    </div>

    <button class="accordion">How do I add a new task?</button>
    <div class="panel">
        <p>After logging in, navigate to the "Task Management" page and click on "Add New Task". Fill out the task details and submit the form.</p>
    </div>

    <button class="accordion">Can I edit or delete a task?</button>
    <div class="panel">
        <p>Yes, you can edit or delete a task by clicking on the respective buttons next to the task in the "Task Management" page.</p>
    </div>

    <button class="accordion">How do I logout?</button>
    <div class="panel">
        <p>Click on the "Logout" button in the navigation bar to securely log out of your account.</p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const accordions = document.querySelectorAll('.accordion');
        accordions.forEach(accordion => {
            accordion.addEventListener('click', function() {
                this.classList.toggle('active');
                const panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        });
    });
</script>
@endsection
