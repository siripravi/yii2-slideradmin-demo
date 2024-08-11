<div class="row">
            <h1 class="d-md-none">Cheatsheet Bootstrap 5.1.1</h1>
            <p class="lead d-md-none">Kitchen sink of Bootstrap components.</p>
            <div class="col-md-3 order-md-last">
                <div class="accordion sticky-top mb-4" id="table-of-contents" style="top: 3rem;">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="contents">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contentsbody" aria-expanded="false" aria-controls="contentsbody">
                                Contents
                            </button>
                        </h2>
                        <div id="contentsbody" class="accordion-collapse collapse" aria-labelledby="contentsbody" data-bs-parent="#table-of-contents">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li><a class="text-dark" href="#typography">Typography</a></li>
                                    <li><a class="text-dark" href="#images">Images</a></li>
                                    <li><a class="text-dark" href="#tables">Tables</a></li>
                                    <li><a class="text-dark" href="#figures">Figures</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="forms">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#formsbody" aria-expanded="false" aria-controls="formsbody">
                                Forms
                            </button>
                        </h2>
                        <div id="formsbody" class="accordion-collapse collapse" aria-labelledby="formsbody" data-bs-parent="#table-of-contents">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li><a class="text-dark" href="#overview">Overview</a></li>
                                    <li><a class="text-dark" href="#disabled-forms">Disabled forms</a></li>
                                    <li><a class="text-dark" href="#sizing">Sizing</a></li>
                                    <li><a class="text-dark" href="#input-group">Input group</a></li>
                                    <li><a class="text-dark" href="#floating-labels">Floating labels</a></li>
                                    <li><a class="text-dark" href="#validation">Validation</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="components">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#componentsbody" aria-expanded="false" aria-controls="componentsbody">
                                Components
                            </button>
                        </h2>
                        <div id="componentsbody" class="accordion-collapse collapse" aria-labelledby="componentsbody" data-bs-parent="#table-of-contents">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li><a class="text-dark" href="#accordion">Accordion</a></li>
                                    <li><a class="text-dark" href="#alerts">Alerts</a></li>
                                    <li><a class="text-dark" href="#badge">Badge</a></li>
                                    <li><a class="text-dark" href="#breadcrumb">Breadcrumb</a></li>
                                    <li><a class="text-dark" href="#buttons">Buttons</a></li>
                                    <li><a class="text-dark" href="#button-group">Button group</a></li>
                                    <li><a class="text-dark" href="#card">Card</a></li>
                                    <li><a class="text-dark" href="#carousel">Carousel</a></li>
                                    <li><a class="text-dark" href="#dropdowns">Dropdowns</a></li>
                                    <li><a class="text-dark" href="#list-group">List group</a></li>
                                    <li><a class="text-dark" href="#modal">Modal</a></li>
                                    <li><a class="text-dark" href="#navs">Navs</a></li>
                                    <li><a class="text-dark" href="#navbar">Navbar</a></li>
                                    <li><a class="text-dark" href="#offcanvas">Offcanvas</a></li>
                                    <li><a class="text-dark" href="#pagination">Pagination</a></li>
                                    <li><a class="text-dark" href="#popovers">Popovers</a></li>
                                    <li><a class="text-dark" href="#progress">Progress</a></li>
                                    <li><a class="text-dark" href="#spinners">Spinners</a></li>
                                    <li><a class="text-dark" href="#toasts">Toasts</a></li>
                                    <li><a class="text-dark" href="#tooltips">Tooltips</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <p class="h1 d-none d-md-block">Cheatsheet Bootstrap 5.1.1</p>
                <p class="lead d-none d-md-block mb-5">Kitchen sink of Bootstrap components.</p>
                <section id="contents" class="pb-5">
                    <h2 class="border-bottom pb-4">Contents</h2>
                    <article class="py-4" id="typography">
                        <h3>Typography</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/content/typography/" rel="noopener">Documentation</a></p>
                        <div>
                            <div class="bd-example">
                                <p class="display-1">Display 1</p>
                                <p class="display-2">Display 2</p>
                                <p class="display-3">Display 3</p>
                                <p class="display-4">Display 4</p>
                                <p class="display-5">Display 5</p>
                                <p class="display-6">Display 6</p>
                            </div>
                            <div class="bd-example">
                                <p class="h1">Heading 1</p>
                                <p class="h2">Heading 2</p>
                                <p class="h3">Heading 3</p>
                                <p class="h4">Heading 4</p>
                                <p class="h5">Heading 5</p>
                                <p class="h6">Heading 6</p>
                            </div>
                            <div class="bd-example">
                                <p class="lead">
                                    This is a lead paragraph. It stands out from regular paragraphs.
                                </p>
                            </div>
                            <div class="bd-example">
                                <p>You can use the mark tag to <mark>highlight</mark> text.</p>
                                <p><del>This line of text is meant to be treated as deleted text.</del></p>
                                <p><s>This line of text is meant to be treated as no longer accurate.</s></p>
                                <p><ins>This line of text is meant to be treated as an addition to the document.</ins>
                                </p>
                                <p><u>This line of text will render as underlined.</u></p>
                                <p><small>This line of text is meant to be treated as fine print.</small></p>
                                <p><strong>This line rendered as bold text.</strong></p>
                                <p><em>This line rendered as italicized text.</em></p>
                            </div>
                            <div class="bd-example">
                                <blockquote class="blockquote">
                                    <p>A well-known quote, contained in a blockquote element.</p>
                                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                </blockquote>
                            </div>
                            <div class="bd-example">
                                <ul class="list-unstyled">
                                    <li>This is a list.</li>
                                    <li>It appears completely unstyled.</li>
                                    <li>Structurally, it's still a list.</li>
                                    <li>However, this style only applies to immediate child elements.</li>
                                    <li>
                                        Nested lists:
                                        <ul>
                                            <li>are unaffected by this style</li>
                                            <li>will still show a bullet</li>
                                            <li>and have appropriate left margin</li>
                                        </ul>
                                    </li>
                                    <li>This may still come in handy in some situations.</li>
                                </ul>
                            </div>
                            <div class="bd-example">
                                <ul class="list-inline">
                                    <li class="list-inline-item">This is a list item.</li>
                                    <li class="list-inline-item">And another one.</li>
                                    <li class="list-inline-item">But they're displayed inline.</li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="images">
                        <h3>Images</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/content/images/" rel="noopener">Documentation</a></p>
                        <div>
                            <div class="bd-example mb-4">
                                <svg class="bd-placeholder-img bd-placeholder-img-lg img-fluid" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Responsive image" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#868e96"></rect>
                                    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Responsive image</text>
                                </svg>
                            </div>
                            <div class="bd-example">
                                <svg class="bd-placeholder-img img-thumbnail" width="200" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera: 200x200" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>A generic square placeholder image with a white border around it, making it
                                        resemble a photograph taken with an old instant camera</title>
                                    <rect width="100%" height="100%" fill="#868e96"></rect>
                                    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">200x200</text>
                                </svg>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="tables">
                        <h3>Tables</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/content/tables/" rel="noopener">Documentation</a></p>
                        <div>
                            <div class="bd-example mb-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bd-example mb-4">
                                <table class="table table-dark table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bd-example mb-4">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Class</th>
                                            <th scope="col">Heading</th>
                                            <th scope="col">Heading</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Default</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-primary">
                                            <th scope="row">Primary</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-secondary">
                                            <th scope="row">Secondary</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-success">
                                            <th scope="row">Success</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-danger">
                                            <th scope="row">Danger</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-warning">
                                            <th scope="row">Warning</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-info">
                                            <th scope="row">Info</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-light">
                                            <th scope="row">Light</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-dark">
                                            <th scope="row">Dark</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bd-example mb-4">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </article>
                    <article class="py-3" id="figures">
                        <h3>Figures</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/content/figures/" rel="noopener">Documentation</a></p>
                        <div>
                            <div class="bd-example">
                                <figure class="figure">
                                    <svg class="bd-placeholder-img figure-img img-fluid rounded" width="400" height="300" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 400x300" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#868e96"></rect>
                                        <text x="50%" y="50%" fill="#dee2e6" dy=".3em">400x300</text>
                                    </svg>
                                    <figcaption class="figure-caption">A caption for the above image.</figcaption>
                                </figure>
                            </div>
                        </div>
                    </article>
                </section>
                <section id="forms" class="pb-5">
                    <h2 class="border-bottom pb-4">Forms</h2>
                    <article class="py-3" id="overview">
                        <h3>Overview</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/forms/overview/" rel="noopener">Documentation</a></p>
                        <div>
                            <div class="bd-example">
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone
                                            else.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <fieldset class="mb-3">
                                        <legend>Radios buttons</legend>
                                        <div class="form-check">
                                            <input type="radio" name="radios" class="form-check-input" id="exampleRadio1">
                                            <label class="form-check-label" for="exampleRadio1">Default radio</label>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                            <label class="form-check-label" for="exampleRadio2">Another radio</label>
                                        </div>
                                    </fieldset>
                                    <div class="mb-3">
                                        <label class="form-label" for="customFile">Upload</label>
                                        <input type="file" class="form-control" id="customFile">
                                    </div>
                                    <div class="mb-3 form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch
                                            checkbox input</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="customRange3" class="form-label">Example range</label>
                                        <input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange3">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="disabled-forms">
                        <h3>Disabled forms</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/forms/overview/#disabled-forms" rel="noopener">Documentation</a></p>
                        <div>
                            <div class="bd-example">
                                <form>
                                    <fieldset disabled="" aria-label="Disabled fieldset example">
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Disabled input</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledSelect" class="form-label">Disabled select menu</label>
                                            <select id="disabledSelect" class="form-select">
                                                <option>Disabled select</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled="">
                                                <label class="form-check-label" for="disabledFieldsetCheck">
                                                    Can't check this
                                                </label>
                                            </div>
                                        </div>
                                        <fieldset class="mb-3">
                                            <legend>Disabled radios buttons</legend>
                                            <div class="form-check">
                                                <input type="radio" name="radios" class="form-check-input" id="disabledRadio1" disabled="">
                                                <label class="form-check-label" for="disabledRadio1">Disabled
                                                    radio</label>
                                            </div>
                                            <div class="mb-3 form-check">
                                                <input type="radio" name="radios" class="form-check-input" id="disabledRadio2" disabled="">
                                                <label class="form-check-label" for="disabledRadio2">Another
                                                    radio</label>
                                            </div>
                                        </fieldset>
                                        <div class="mb-3">
                                            <label class="form-label" for="disabledCustomFile">Upload</label>
                                            <input type="file" class="form-control" id="disabledCustomFile" disabled="">
                                        </div>
                                        <div class="mb-3 form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="disabledSwitchCheckChecked" checked="" disabled="">
                                            <label class="form-check-label" for="disabledSwitchCheckChecked">Disabled
                                                checked switch checkbox input</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledRange" class="form-label">Disabled range</label>
                                            <input type="range" class="form-range" min="0" max="5" step="0.5" id="disabledRange">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="sizing">
                        <h3>Sizing</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/forms/form-control/#sizing" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <div class="mb-3">
                                <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example">
                            </div>
                            <div class="mb-3">
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    <option selected="">Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control form-control-lg" aria-label="Large file input example">
                            </div>
                        </div>
                        <div class="bd-example">
                            <div class="mb-3">
                                <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
                            </div>
                            <div class="mb-3">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected="">Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control form-control-sm" aria-label="Small file input example">
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="input-group">
                        <h3>Input group</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/forms/input-group/" rel="noopener">Documentation</a></p>
                        <div>
                            <div class="bd-example">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2">@example.com</span>
                                </div>
                                <label for="basic-url" class="form-label">Your vanity URL</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text">.00</span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text">With textarea</span>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="floating-labels">
                        <h3>Floating labels</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/forms/floating-labels/" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <form>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                            </form>
                        </div>
                    </article>
                    <article class="py-4" id="validation">
                        <h3>Validation</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/forms/validation/" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <form class="row g-3">
                                <div class="col-md-4">
                                    <label for="validationServer01" class="form-label">First name</label>
                                    <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required="">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationServer02" class="form-label">Last name</label>
                                    <input type="text" class="form-control is-valid" id="validationServer02" value="Otto" required="">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationServerUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                        <input type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3" required="">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationServer03" class="form-label">City</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer03" required="">
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationServer04" class="form-label">State</label>
                                    <select class="form-select is-invalid" id="validationServer04" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationServer05" class="form-label">Zip</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer05" required="">
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required="">
                                        <label class="form-check-label" for="invalidCheck3">
                                            Agree to terms and conditions
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </div>
                            </form>
                        </div>
                    </article>
                </section>
                <section id="components" class="pb-5">
                    <h2 class="border-bottom pb-4">Components</h2>
                    <article class="py-4" id="accordion">
                        <h3>Accordion</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/accordion/" rel="noopener">Documentation</a></p>
                        <div>
                            <div class="bd-example">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h4 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Accordion Item #1
                                            </button>
                                        </h4>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>This is the first item's accordion body.</strong> It is hidden
                                                by default, until the collapse plugin adds the appropriate classes that
                                                we use to style each element. These classes control the overall
                                                appearance, as well as the showing and hiding via CSS transitions. You
                                                can modify any of this with custom CSS or overriding our default
                                                variables. It's also worth noting that just about any HTML can go within
                                                the <code>.accordion-body</code>, though the transition does limit
                                                overflow.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h4 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Accordion Item #2
                                            </button>
                                        </h4>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>This is the second item's accordion body.</strong> It is hidden
                                                by default, until the collapse plugin adds the appropriate classes that
                                                we use to style each element. These classes control the overall
                                                appearance, as well as the showing and hiding via CSS transitions. You
                                                can modify any of this with custom CSS or overriding our default
                                                variables. It's also worth noting that just about any HTML can go within
                                                the <code>.accordion-body</code>, though the transition does limit
                                                overflow.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h4 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Accordion Item #3
                                            </button>
                                        </h4>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>This is the third item's accordion body.</strong> It is hidden
                                                by default, until the collapse plugin adds the appropriate classes that
                                                we use to style each element. These classes control the overall
                                                appearance, as well as the showing and hiding via CSS transitions. You
                                                can modify any of this with custom CSS or overriding our default
                                                variables. It's also worth noting that just about any HTML can go within
                                                the <code>.accordion-body</code>, though the transition does limit
                                                overflow.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="alerts">
                        <h3>Alerts</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/alerts/" rel="noopener">Documentation</a></p>
                        <div>
                            <div class="bd-example">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    A simple primary alert with <a href="#" class="alert-link">an example link</a>. Give
                                    it a click if you like.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                    A simple secondary alert with <a href="#" class="alert-link">an example link</a>.
                                    Give it a click if you like.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    A simple success alert with <a href="#" class="alert-link">an example link</a>. Give
                                    it a click if you like.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    A simple danger alert with <a href="#" class="alert-link">an example link</a>. Give
                                    it a click if you like.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    A simple warning alert with <a href="#" class="alert-link">an example link</a>. Give
                                    it a click if you like.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    A simple info alert with <a href="#" class="alert-link">an example link</a>. Give it
                                    a click if you like.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div class="alert alert-light alert-dismissible fade show" role="alert">
                                    A simple light alert with <a href="#" class="alert-link">an example link</a>. Give
                                    it a click if you like.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    A simple dark alert with <a href="#" class="alert-link">an example link</a>. Give it
                                    a click if you like.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            <div class="bd-example">
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Well done!</h4>
                                    <p>Aww yeah, you successfully read this important alert message. This example text
                                        is going to run a bit longer so that you can see how spacing within an alert
                                        works with this kind of content.</p>
                                    <hr>
                                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things
                                        nice and tidy.</p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="badge">
                        <h3>Badge</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/badge/" rel="noopener">Documentation</a></p>
                        <div class="bd-example mb-4">
                            <p class="h1">Example heading <span class="badge bg-primary">New</span></p>
                            <p class="h2">Example heading <span class="badge bg-secondary">New</span></p>
                            <p class="h3">Example heading <span class="badge bg-success">New</span></p>
                            <p class="h4">Example heading <span class="badge bg-danger">New</span></p>
                            <p class="h5">Example heading <span class="badge bg-warning text-dark">New</span></p>
                            <p class="h6">Example heading <span class="badge bg-info text-dark">New</span></p>
                            <p class="h6">Example heading <span class="badge bg-light text-dark">New</span></p>
                            <p class="h6">Example heading <span class="badge bg-dark">New</span></p>
                        </div>
                        <div class="bd-example">
                            <span class="badge rounded-pill bg-primary">Primary</span>
                            <span class="badge rounded-pill bg-secondary">Secondary</span>
                            <span class="badge rounded-pill bg-success">Success</span>
                            <span class="badge rounded-pill bg-danger">Danger</span>
                            <span class="badge rounded-pill bg-warning text-dark">Warning</span>
                            <span class="badge rounded-pill bg-info text-dark">Info</span>
                            <span class="badge rounded-pill bg-light text-dark">Light</span>
                            <span class="badge rounded-pill bg-dark">Dark</span>
                        </div>
                    </article>
                    <article class="py-4" id="breadcrumb">
                        <h3>Breadcrumb</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/breadcrumb/" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb d-flex">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                                </ol>
                            </nav>
                        </div>
                    </article>
                    <article class="py-4" id="buttons">
                        <h3>Buttons</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/buttons/" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <button type="button" class="btn btn-primary mb-1">Primary</button>
                            <button type="button" class="btn btn-secondary mb-1">Secondary</button>
                            <button type="button" class="btn btn-success mb-1">Success</button>
                            <button type="button" class="btn btn-danger mb-1">Danger</button>
                            <button type="button" class="btn btn-warning mb-1">Warning</button>
                            <button type="button" class="btn btn-info mb-1">Info</button>
                            <button type="button" class="btn btn-light mb-1">Light</button>
                            <button type="button" class="btn btn-dark mb-1">Dark</button>
                            <button type="button" class="btn btn-link mb-1">Link</button>
                        </div>
                        <div class="bd-example">
                            <button type="button" class="btn btn-outline-primary mb-1">Primary</button>
                            <button type="button" class="btn btn-outline-secondary mb-1">Secondary</button>
                            <button type="button" class="btn btn-outline-success mb-1">Success</button>
                            <button type="button" class="btn btn-outline-danger mb-1">Danger</button>
                            <button type="button" class="btn btn-outline-warning mb-1">Warning</button>
                            <button type="button" class="btn btn-outline-info mb-1">Info</button>
                            <button type="button" class="btn btn-outline-light mb-1">Light</button>
                            <button type="button" class="btn btn-outline-dark mb-1">Dark</button>
                        </div>
                        <div class="bd-example">
                            <button type="button" class="btn btn-primary btn-sm mb-1">Small button</button>
                            <button type="button" class="btn btn-primary mb-1">Standard button</button>
                            <button type="button" class="btn btn-primary btn-lg mb-1">Large button</button>
                        </div>
                    </article>
                    <article class="py-4" id="button-group">
                        <h3>Button group</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/button-group/" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group me-2" role="group" aria-label="First group">
                                    <button type="button" class="btn btn-secondary">1</button>
                                    <button type="button" class="btn btn-secondary">2</button>
                                    <button type="button" class="btn btn-secondary">3</button>
                                    <button type="button" class="btn btn-secondary">4</button>
                                </div>
                                <div class="btn-group me-2" role="group" aria-label="Second group">
                                    <button type="button" class="btn btn-secondary">5</button>
                                    <button type="button" class="btn btn-secondary">6</button>
                                    <button type="button" class="btn btn-secondary">7</button>
                                </div>
                                <div class="btn-group" role="group" aria-label="Third group">
                                    <button type="button" class="btn btn-secondary">8</button>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="card">
                        <h3>Card</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/card/" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <div class="row  row-cols-1 row-cols-md-2 g-4">
                                <div class="col">
                                    <div class="card">
                                        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#868e96"></rect>
                                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                                        </svg>
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            Featured
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                        <div class="card-footer text-muted">
                                            2 days ago
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">An item</li>
                                            <li class="list-group-item">A second item</li>
                                            <li class="list-group-item">A third item</li>
                                        </ul>
                                        <div class="card-body">
                                            <a href="#" class="card-link">Card link</a>
                                            <a href="#" class="card-link">Another link</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-lg-4">
                                                <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false">
                                                    <title>Placeholder</title>
                                                    <rect width="100%" height="100%" fill="#868e96"></rect>
                                                    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text>
                                                </svg>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a wider card with supporting text below
                                                        as a natural lead-in to additional content. This content is a
                                                        little bit longer.</p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                            ago</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="carousel">
                        <h3>Carousel</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/carousel/" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide" preserveAspectRatio="xMidYMid slice" focusable="false">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#777"></rect>
                                            <text x="50%" y="50%" fill="#555" dy=".3em">First slide</text>
                                        </svg>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>First slide label</h5>
                                            <p>Some representative placeholder content for the first slide.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide" preserveAspectRatio="xMidYMid slice" focusable="false">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#666"></rect>
                                            <text x="50%" y="50%" fill="#444" dy=".3em">Second slide</text>
                                        </svg>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Second slide label</h5>
                                            <p>Some representative placeholder content for the second slide.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide" preserveAspectRatio="xMidYMid slice" focusable="false">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#555"></rect>
                                            <text x="50%" y="50%" fill="#333" dy=".3em">Third slide</text>
                                        </svg>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Third slide label</h5>
                                            <p>Some representative placeholder content for the third slide.</p>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="dropdowns">
                        <h3>Dropdowns</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/dropdowns/" rel="noopener">Documentation</a></p>
                        <div class="bd-example mb-3">
                            <div class="btn-group w-100 align-items-center flex-wrap">
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle mb-1 me-1" type="button" id="dropdownMenuButtonSM" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown button
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSM">
                                        <li>
                                            <h6 class="dropdown-header">Dropdown header</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle mb-1 me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown button
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Dropdown header</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-lg dropdown-toggle mb-1 me-1" type="button" id="dropdownMenuButtonLG" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown button
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonLG">
                                        <li>
                                            <h6 class="dropdown-header">Dropdown header</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="bd-example mb-3">
                            <div class="btn-group me-1 mb-1">
                                <button type="button" class="btn btn-primary">Primary</button>
                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                            <!-- /btn-group -->
                            <div class="btn-group me-1 mb-1">
                                <button type="button" class="btn btn-secondary">Secondary</button>
                                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                            <!-- /btn-group -->
                            <div class="btn-group me-1 mb-1">
                                <button type="button" class="btn btn-success">Success</button>
                                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                            <!-- /btn-group -->
                            <div class="btn-group me-1 mb-1">
                                <button type="button" class="btn btn-info">Info</button>
                                <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                            <!-- /btn-group -->
                            <div class="btn-group me-1 mb-1">
                                <button type="button" class="btn btn-warning">Warning</button>
                                <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                            <!-- /btn-group -->
                            <div class="btn-group me-1 mb-1">
                                <button type="button" class="btn btn-danger">Danger</button>
                                <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                            <!-- /btn-group -->
                        </div>
                        <div class="bd-example">
                            <div class="btn-group w-100 align-items-center flex-wrap">
                                <div class="dropend">
                                    <button class="btn btn-secondary dropdown-toggle me-1 mb-1" type="button" id="dropendMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropend button
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropendMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Dropdown header</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <div class="dropup">
                                    <button class="btn btn-secondary dropdown-toggle me-1 mb-1" type="button" id="dropupMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropup button
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropupMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Dropdown header</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <div class="dropstart">
                                    <button class="btn btn-secondary dropdown-toggle me-1 mb-1" type="button" id="dropstartMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropstart button
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropstartMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Dropdown header</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="bd-example">
                            <div class="btn-group">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle me-1 mb-1" type="button" id="dropdownRightMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        End-aligned menu
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownRightMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Dropdown header</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="list-group">
                        <h3>List group</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/list-group/" rel="noopener">Documentation</a></p>
                        <div class="bd-example mb-4">
                            <ul class="list-group">
                                <li class="list-group-item disabled" aria-disabled="true">A disabled item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                                <li class="list-group-item">A fourth item</li>
                                <li class="list-group-item">And a fifth one</li>
                            </ul>
                        </div>
                        <div class="bd-example mb-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                                <li class="list-group-item">A fourth item</li>
                                <li class="list-group-item">And a fifth one</li>
                            </ul>
                        </div>
                        <div class="bd-example">
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action">A simple default list group
                                    item</a>
                                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">A
                                    simple primary list group item</a>
                                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A
                                    simple secondary list group item</a>
                                <a href="#" class="list-group-item list-group-item-action list-group-item-success">A
                                    simple success list group item</a>
                                <a href="#" class="list-group-item list-group-item-action list-group-item-danger">A
                                    simple danger list group item</a>
                                <a href="#" class="list-group-item list-group-item-action list-group-item-warning">A
                                    simple warning list group item</a>
                                <a href="#" class="list-group-item list-group-item-action list-group-item-info">A simple
                                    info list group item</a>
                                <a href="#" class="list-group-item list-group-item-action list-group-item-light">A
                                    simple light list group item</a>
                                <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A simple
                                    dark list group item</a>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="modal">
                        <h3>Modal</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/modal/" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <div class="d-flex flex-wrap">
                                <button type="button" class="btn btn-primary me-1 mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalDefault">
                                    Launch demo modal
                                </button>
                                <button type="button" class="btn btn-primary me-1 mb-1" data-bs-toggle="modal" data-bs-target="#staticBackdropLive">
                                    Launch static backdrop modal
                                </button>
                                <button type="button" class="btn btn-primary me-1 mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
                                    Vertically centered scrollable modal
                                </button>
                                <button type="button" class="btn btn-primary me-1 mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">
                                    Full screen
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalDefault" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="staticBackdropLive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLiveLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>I will not close if you click outside me. Don't even try to press escape key.
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Understood</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Modal title
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>This is some placeholder content to show the scrolling behavior for modals.
                                            We use repeated line breaks to demonstrate how content can exceed minimum
                                            inner height, thereby showing inner scrolling. When content becomes longer
                                            than the prefedined max-height of modal, content will be cropped and
                                            scrollable within the modal.</p>
                                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                        <p>This content should appear at the bottom after you scroll.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="exampleModalFullscreenLabel">Full screen modal
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="navs">
                        <h3>Navs</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/navs-tabs/" rel="noopener">Documentation</a></p>
                        <div class="bd-example mb-4">
                            <nav class="nav">
                                <a class="nav-link active" aria-current="page" href="#">Active</a>
                                <a class="nav-link" href="#">Link</a>
                                <a class="nav-link" href="#">Link</a>
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                            </nav>
                        </div>
                        <div class="bd-example mb-4">
                            <nav>
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <p><strong>This is some placeholder content the Home tab's associated
                                            content.</strong> Clicking another tab will toggle the visibility of this
                                        one for the next. The tab JavaScript swaps classes to control the content
                                        visibility and styling. You can use it with tabs, pills, and any other
                                        <code>.nav</code>-powered navigation.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <p><strong>This is some placeholder content the Profile tab's associated
                                            content.</strong> Clicking another tab will toggle the visibility of this
                                        one for the next. The tab JavaScript swaps classes to control the content
                                        visibility and styling. You can use it with tabs, pills, and any other
                                        <code>.nav</code>-powered navigation.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <p><strong>This is some placeholder content the Contact tab's associated
                                            content.</strong> Clicking another tab will toggle the visibility of this
                                        one for the next. The tab JavaScript swaps classes to control the content
                                        visibility and styling. You can use it with tabs, pills, and any other
                                        <code>.nav</code>-powered navigation.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bd-example">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <article class="py-4" id="navbar">
                        <h3>Navbar</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/navbar/" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <nav class="navbar navbar-expand-xl navbar-light bg-light mb-4">
                                <div class="container-fluid">
                                    <a class="navbar-brand" href="#">
                                        <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo-white.svg" width="38" height="30" class="d-inline-block align-top" alt="Bootstrap" loading="lazy" style="filter: invert(1) grayscale(100%) brightness(200%);">
                                    </a>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Link</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Dropdown
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                            </li>
                                        </ul>
                                        <form class="d-flex">
                                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-dark" type="submit" style="width: 105px;">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </nav>
                            <nav class="navbar navbar-expand-xl navbar-dark bg-primary mb-4">
                                <div class="container-fluid">
                                    <a class="navbar-brand" href="#">
                                        <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo-white.svg" width="38" height="30" class="d-inline-block align-top" alt="Bootstrap" loading="lazy">
                                    </a>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Link</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Dropdown
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                            </li>
                                        </ul>
                                        <form class="d-flex">
                                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-light" type="submit" style="width: 105px;">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </nav>
                            <nav class="navbar navbar-expand-xxl navbar-light bg-light">
                                <div class="container-fluid">
                                    <a class="navbar-brand" href="#">Offcanvas navbar</a>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Link</a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Dropdown
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <form class="d-flex">
                                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                                <button class="btn btn-outline-success" style="width: 102px;" type="submit">Search</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </article>
                    <article class="py-4" id="offcanvas">
                        <h3>Offcanvas</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/offcanvas/" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <button class="btn btn-primary mb-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Toggle top
                                offcanvas</button>
                            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasTopLabel">Offcanvas top</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    ...
                                </div>
                            </div>
                            <button class="btn btn-primary mb-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right
                                offcanvas</button>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasRightLabel">Offcanvas right</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    ...
                                </div>
                            </div>
                            <button class="btn btn-primary mb-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Toggle bottom
                                offcanvas</button>
                            <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasBottomLabel">Offcanvas bottom</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body small">
                                    ...
                                </div>
                            </div>
                            <button class="btn btn-primary mb-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">Toggle left
                                offcanvas</button>
                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasLeftLabel">Offcanvas left</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body small">
                                    ...
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="pagination">
                        <h3>Pagination</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/pagination/" rel="noopener">Documentation</a></p>
                        <div class="bd-example mb-4">
                            <nav aria-label="Pagination example">
                                <ul class="pagination pagination-sm">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="bd-example mb-4">
                            <nav aria-label="Standard pagination example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="bd-example">
                            <nav aria-label="Another pagination example">
                                <ul class="pagination pagination-lg flex-wrap">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </article>
                    <article class="py-4" id="popovers">
                        <h3>Popovers</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/popovers/" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <button type="button" class="btn btn-lg btn-danger mb-1" data-bs-toggle="popover" title="" data-bs-content="And here's some amazing content. It's very engaging. Right?" data-bs-original-title="Popover title" aria-describedby="popover330348">Click to toggle
                                popover</button>
                        </div>
                        <div class="bd-example">
                            <button type="button" class="btn btn-secondary mb-1" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover">
                                Popover on top
                            </button>
                            <button type="button" class="btn btn-secondary mb-1" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Right popover">
                                Popover on right
                            </button>
                            <button type="button" class="btn btn-secondary mb-1" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Bottom popover">
                                Popover on bottom
                            </button>
                            <button type="button" class="btn btn-secondary mb-1" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="Left popover">
                                Popover on left
                            </button>
                        </div>
                    </article>

                    <article class="py-4" id="progress">
                        <h3>Progress</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/progress/" rel="noopener">Documentation</a></p>
                        <div class="bd-example">
                            <div class="progress mb-3">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-info text-dark w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-warning text-dark w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                            </div>
                        </div>
                        <div class="bd-example">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="spinners">
                        <h3>Spinners</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/spinners/" rel="noopener">Documentation</a></p>
                        <div class="bd-example mb-4">
                            <div class="spinner-border text-primary me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-border text-secondary me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-border text-success me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-border text-danger me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-border text-warning me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-border text-info me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-border text-light me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-border text-dark" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div class="bd-example">
                            <div class="spinner-grow text-primary me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-secondary me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-success me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-danger me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-warning me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-info me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-light me-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-dark" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="toasts">
                        <h3>Toasts</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/toasts/" rel="noopener">Documentation</a></p>
                        <div class="bd-example bg-dark p-5 align-items-center">
                            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <rect width="100%" height="100%" fill="#007aff"></rect>
                                    </svg>
                                    <strong class="me-auto">Bootstrap</strong>
                                    <small class="text-muted">11 mins ago</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    Hello, world! This is a toast message.
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="py-4" id="tooltips">
                        <h3>Tooltips</h3>
                        <p class="lead"><a target="_blank" href="https://getbootstrap.com/docs/5.0/components/tooltips/" rel="noopener">Documentation</a></p>
                        <div class="bd-example mb-4">
                            <button type="button" class="btn btn-secondary mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                                Tooltip on top
                            </button>
                            <button type="button" class="btn btn-secondary mb-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">
                                Tooltip on right
                            </button>
                            <button type="button" class="btn btn-secondary mb-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                                Tooltip on bottom
                            </button>
                            <button type="button" class="btn btn-secondary mb-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Tooltip on left">
                                Tooltip on left
                            </button>
                        </div>
                    </article>
                </section>

            </div><!-- col -->
        </div><!-- row -->
