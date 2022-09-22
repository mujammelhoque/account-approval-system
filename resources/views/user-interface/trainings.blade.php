@extends('user-interface.user_layout')
@section('trainings-active')
active 
@endsection
@section('content')
<br>
<br>
<div class="container mt-5" >

    <div class="row">
        <div class="col-sm-8 mb-5">
            <div class="jumbotron">
                <h1>Trainings</h1>
            </div>

            <div class="mb-5">
                <p><b>Training on Certified Information Systems Security Professional (CISSP) </b></p>
                <p>42 Hours – online (once in a week)</p>
                <p>Starting date: Workshop- 7th Aug 2021</p>
            </div>

            <ul>

                <p><strong>Course outline</strong></p>

                <div class="bg-light p-3">
                    <p class="text-leader">1. Security and Risk management</p>
                </div>
                <p class="text-secondary">Understand and apply security concepts</p>
                <p class="text-secondary">Evaluate and apply security governance principles</p>
                <p class="text-secondary">Determine compliance and other requirements</p>
                <p class="text-secondary">Understand legal and regulatory issues that pertain to information security in
                    a
                    holistic context</p>
                <p class="text-secondary">Understand requirements for investigation types (i.e., administrative,
                    criminal,
                    civil, regulatory, industry standards)</p>
                <p class="text-secondary">Develop, document, and implement security policy, standards, procedures, and
                    guidelines</p>
                <p class="text-secondary">Identify, analyze, and prioritize Business Continuity (BC) requirements</p>
                <p class="text-secondary">Contribute to and enforce personnel security policies and procedure</p>
                <p class="text-secondary">Understand and apply risk management concepts</p>
                <p class="text-secondary">Understand and apply threat modeling concepts and methodologies</p>
                <p class="text-secondary">Apply Supply Chain Risk Management (SCRM) concepts</p>
                <p class="text-secondary">Establish and maintain a security awareness, education, and training program
                </p>


            </ul>
            <ul>
                <div class="bg-light p-3">
                    <p class="text-leader">2. Asset Security</p>
                </div>
                <p class="text-secondary">Identify and classify information and assets</p>
                <p class="text-secondary">Establish information and asset handling requirements</p>
                <p class="text-secondary">Provision resources securely</p>
                <p class="text-secondary">Manage data lifecycle</p>
                <p class="text-secondary">Ensure appropriate asset retention (e.g., End-of-Life (EOL), End-of-Support
                    (EOS))
                </p>
                <p class="text-secondary">Determine data security controls and compliance requirements (DRM, CASB, DLP)
                </p>

            </ul>
            <ul>
                <div class="bg-light p-3">
                    <p class="text-leader">3. Security Architecture and Engineering</p>
                </div>

                <p class="text-secondary">Research, implement and manage engineering processes using secure design
                    principles </p>
                <p class="text-secondary">Understand the fundamental concepts of security models (e.g., Biba, Star
                    Model,
                    Bell-LaPadula)</p>
                <p class="text-secondary">Select controls based upon systems security requirements</p>
                <p class="text-secondary">Understand security capabilities of Information Systems (IS) (e.g., memory
                    protection, Trusted Platform Module (TPM), encryption/decryption)</p>
                <p class="text-secondary">Assess and mitigate the vulnerabilities of security architectures, designs,
                    and
                    solution elements</p>
                <p class="text-secondary">Select and determine cryptographic solutions</p>
                <p class="text-secondary">Understand methods of cryptanalytic attacks </p>
                <p class="text-secondary">Apply security principles to site and facility design</p>
                <p class="text-secondary">Design site and facility security controls</p>

            </ul>
            <ul>
                <div class="bg-light p-3">
                    <p class="text-leader">4. Communication and Network Security</p>
                </div>

                <p class="text-secondary">Assess and implement secure design principles in network architectures </p>
                <p class="text-secondary"> Secure network components</p>
                <p class="text-secondary">Multilayer protocol </p>
                <p class="text-secondary">Implement secure communication channels according to design</p>
                <p class="text-secondary">Network Attacks</p>

            </ul>
            <ul>
                <div class="bg-light p-3">
                    <p class="text-leader">5. Identity and Access Management (IAM)</p>
                </div>

                <p class="text-secondary">Control physical and logical access to assets</p>
                <p class="text-secondary">Manage identification and authentication of people, devices, and services</p>
                <p class="text-secondary">(Single Sign On (SSO) » Just-In-Time (JIT))</p>
                <p class="text-secondary">Federated identity with a third-party service</p>
                <p class="text-secondary">Implement and manage authorization mechanisms</p>
                <p class="text-secondary">Manage the identity and access provisioning lifecycle</p>
                <p class="text-secondary">Implement authentication systems </p>

            </ul>
            <ul>
                <div class="bg-light p-3">
                    <p class="text-leader">6. Security Assessment and Testing</p>
                </div>

                <p class="text-secondary">Design and validate assessment, test, and audit strategies</p>
                <p class="text-secondary">Conduct security control testing</p>
                <p class="text-secondary">Collect security process data (e.g., technical and administrative)</p>
                <p class="text-secondary">Analyze test output and generate report</p>
                <p class="text-secondary">Conduct or facilitate security audits</p>

            </ul>
            <ul>
                <div class="bg-light p-3">
                    <p class="text-leader">7. Security Operations</p>
                </div>

                <p class="text-secondary">Understand and comply with investigations</p>
                <p class="text-secondary">Conduct logging and monitoring activities</p>
                <p class="text-secondary">Perform Configuration Management (CM) (e.g., provisioning, baselining,
                    automation)
                </p>
                <p class="text-secondary">Conduct incident management</p>
                <p class="text-secondary">Operate and maintain detective and preventative measures</p>
                <p class="text-secondary">Implement and support patch and vulnerability management</p>
                <p class="text-secondary">Understand and participate in change management processes</p>
                <p class="text-secondary">Implement recovery strategies</p>
                <p class="text-secondary">Implement Disaster Recovery (DR) processes</p>
                <p class="text-secondary">Test Disaster Recovery Plans (DRP)</p>
                <p class="text-secondary">Participate in Business Continuity (BC) planning and exercises</p>
                <p class="text-secondary">Implement and manage physical security</p>
                <p class="text-secondary">Address personnel safety and security concerns</p>
            </ul>
            <ul>
                <div class="bg-light p-3">
                    <p class="text-leader">8. Software Development Security</p>
                </div>

                <p class="text-secondary">Understand and integrate security in the Software Development Life Cycle
                    (SDLC)
                </p>
                <p class="text-secondary">Identify and apply security controls in software development ecosystems </p>
                <p class="text-secondary">Assess the effectiveness of software security</p>
                <p class="text-secondary">Assess security impact of acquired software</p>
                <p class="text-secondary">Define and apply secure coding guidelines and standards</p>
            </ul>


        </div>
        <div class="col-sm-4 mb-5">
            <img src="{{ asset('images') }}/cissp_certification.jpg" width="300">

            <div class="m-1 bg-light">
                <label class="bg-info text-white p-2">For any query about the training program, please fill in the form
                    below:</label>

                <Form method="POST" action="comment_form.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="emaiID" name="n_email"
                            placeholder="name@example.com">
                        <input type="hidden" class="form-control" name="n_page_data" value="Training.php">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Mobile / Phone Number</label>
                        <input type="phone" class="form-control" id="phoneID" name="n_phone"
                            placeholder="01?-????-????">
                    </div>

                    <div class="mb-3">
                        <label for="comment" class="form-label">Query</label>
                        <textarea class="form-control" id="commentID" name="n_comment" rows="3"></textarea>
                    </div>

                    <div class="float-end">
                        <button type="submit" class="btn btn-primary mb-3">Submit Query</button>
                    </div>
                </FORM>
                            </div>
        </div>
    </div>
    <div class="row p-5">
        <h2>IT Solution</h2>
        RESL aims to bring out its IT experience to the market and to meet the Millennium Development Goal (MGD). It
        emphasis on providing technical consultancy to plan, procure, deploy and operate of Enterprise IT
        infrastructure. It assists organisations with end-to-end networking, remote office/application connectivity,
        datacenter buildup and operation of active and passive components. RESL guides and enables its clients with
        futuristic, disaster tolerant, scalable plan for centralised/distributed operation and formulating
        digitisation of enterprise IT systems focusing on business need.
    </div>
</div>

    
@endsection