<style>
    

    .booking-container {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .booking-card {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-width: 1100px;
        width: 100%;
    }

    .form-title { 
        color: #021016; 
        letter-spacing: 3px; 
        margin-bottom: 40px; 
        font-weight: 700; 
        text-transform: uppercase;
        text-align: center;
    }

    .form-label { 
        font-weight: 600; 
        font-size: 0.9rem;
        color: #444;
    }

    .form-control {
        border: none;
        border-bottom: 2px solid #ced4da;
        border-radius: 0;
        background: transparent;
        padding-left: 0;
    }

    .form-control:focus {
        box-shadow: none;
        border-bottom-color: #003333;
        outline: none;
    }

    .btn-submit {
        background-color:#3cbeee;
        color: white;
        border: none;
        padding: 14px;
        font-weight: bold;
        margin-top: 40px;
        letter-spacing: 1px;
        width: 100%;
        border-radius: 6px;
    }

    .btn-submit:hover {
        background-color: black;
        color:white;
    }

    /* 📱 Mobile fixes */
    @media (max-width: 768px) {
        .booking-card {
            padding: 25px;
        }

        .form-title {
            font-size: 1.2rem;
            letter-spacing: 2px;
        }
    }
</style>

<div class="container booking-container" id="tables">
    <div class="booking-card">
        <h1 class="form-title">Book a Table</h1>

        <form>
            <div class="row g-4">
                <div class="col-md-6 col-lg">
                    <label class="form-label">Name *</label>
                    <input type="text" class="form-control" required>
                </div>

                <div class="col-md-6 col-lg">
                    <label class="form-label">Contact Number *</label>
                    <input type="tel" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Date *</label>
                    <input type="date" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Time *</label>
                    <input type="time" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">No of People *</label>
                    <input type="number" class="form-control" min="1" required>
                </div>
            </div>

            <button type="submit" class="btn btn-submit">
                Submit Booking
            </button>
        </form>
    </div>
</div>
