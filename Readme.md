Please have xampp installed and available in your device.

Clone the repository inside htdocs folder in xampp.(C:\xampp\htdocs)

Start Apache and MySql in Xampp Control Panel.

Go to locolhost/phpmyadmin:
    Create a database with the name "eboutsource_db" if it doesnt exist already.
    Click on the "eboutsource_db" database and under SQL tab, type the following lines of code:
    


    create table if not exists outsource_payments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        icon VARCHAR(255) NOT NULL,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL
    );

    Insert into outsource_payments (icon, title, description) values 
        ("Earthicon.png", "Access up to $100,000", "We fund each invoice once approved and collect payment to optimise your cash flow."),
        ("Earthicon.png", "You choose invoices to get paid", "Self-serve online portal available 24/7 or connect from your CRM or invoicing platform."),
        ("Earthicon.png", "Simple pricing", "Only pay for what you use, if you don't need us, there are no costs."),
        ("Earthicon.png", "Click and quick", "We fund each invoice once approved and collect payment to optimise your cash flow."),
        ("Earthicon.png", "Flexible", "Self-serve online portal available 24/7 or connect from your CRM or invoicing platform."),
        ("Earthicon.png", "Invest in your business", "Only pay for what you use, if you don't need us, there are no costs.");

    create table if not exists tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        task VARCHAR(255) NOT NULL,
        status ENUM('active', 'completed', 'deleted') DEFAULT 'active',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE contacts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL,
        number VARCHAR(15),
        message TEXT NOT NULL,
        submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
        


after typing these lines of code under SQL tab, click on the Go button on the bottom right corner.
This will create all the required columns.

Now run localhost/CMS-Assignment in your browser.

Feel free to raise any queries by mail or connect with me on linkedin at
https://www.linkedin.com/in/dushyant-shyam-ranjit/ 





I have added a few screenshots of my final result in the SCREENSHOTS folder.
