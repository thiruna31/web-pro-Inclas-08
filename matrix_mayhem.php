        table.matrix caption {
            padding: 0 0 10px;
            text-align: left;
            color: var(--blue);
            font-weight: 700;
        }

        table.matrix td {
            width: 64px;
            min-width: 48px;
            height: 44px;
            padding: 8px 12px;
            border: 1px solid #c5d1e3;
            background: #f7f9fd;
            text-align: center;
            font-weight: 600;
        }

        .telemetry {
            margin: 0 0 12px;
            padding: 13px;
            border-left: 4px solid var(--accent);
            border-radius: 6px;
            background: var(--tile);
            overflow-wrap: anywhere;
        }

        .telemetry strong {
            display: block;
            margin-bottom: 5px;
            color: var(--blue);
        }

        .telemetry p { margin: 4px 0; }

        .row-lengths {
            margin: 6px 0 0;
            padding-left: 20px;
        }

        .explanation {
            margin-bottom: 0;
            color: var(--muted);
        }

        .page-footer {
            padding: 20px 0 26px;
            color: var(--muted);
            font-size: .88rem;
        }

        @media (max-width: 700px) {
            .dashboard { grid-template-columns: 1fr; }
            .panel { padding: 17px; }
            .page-header { padding-top: 20px; }
        }
    </style>
</head>
<body>
    <header class="page-header">
        <h1>Matrix Mayhem: Control Room</h1>
        <p>Student: Thirunavukkarasu Palaniappa | Individual assignment</p>
        <p>PHP Multidimensional Arrays Challenge</p>
        <p>Due: <time datetime="2026-10-21T16:15:00-04:00">October 21, 2026 at 4:15 p.m. EDT</time></p>
    </header>

    <main class="dashboard">
        <section class="panel" aria-labelledby="matrix-heading">
            <h2 id="matrix-heading">Matrix Evolution</h2>
            <div class="matrix-wrap">
                <?php
                renderMatrix($original, 'Mission 1: Original Matrix (3 x 3)');
                renderMatrix($modified, 'Mission 3: Modified Matrix');
                renderMatrix($finalMatrix, 'Mission 4: Expanded Final Matrix');
                ?>
            </div>
        </section>

        <aside class="panel" aria-labelledby="telemetry-heading">
            <h2 id="telemetry-heading">Array Telemetry</h2>

            <div class="telemetry">
                <strong>Mission 2: Original Coordinates</strong>
                <p>[0][0] = <?= $topLeft ?></p>
                <p>[1][1] = <?= $center ?></p>
                <p>[2][2] = <?= $bottomRight ?></p>
            </div>

            <div class="telemetry">
                <strong>Mission 5: Total Rows</strong>
                <p><?= $rowCount ?> rows</p>
            </div>

            <div class="telemetry">
                <strong>Elements in Each Row</strong>
                <ul class="row-lengths">
                    <?php foreach ($rowLengths as $rowIndex => $length): ?>
                        <li>Row <?= $rowIndex ?>: <?= $length ?> elements</li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="telemetry">
                <strong>Total Numeric Cells</strong>
                <p><?= $totalCells ?> cells</p>
            </div>

            <div class="telemetry">
                <strong>Largest Value</strong>
                <p><?= $maxValue ?></p>
            </div>

            <h2>What Changed?</h2>
            <p class="explanation">
                The original 3 x 3 matrix is preserved for comparison. Two values
                are changed in a separate copy: 6 becomes 10 and 8 becomes 15.
                Then 11 is appended to the third row, and a new row containing
                10, 11, 12, and 13 is added. PHP arrays can contain rows of
                different lengths, so the final matrix is a jagged array.
            </p>
        </aside>
    </main>

    <footer class="page-footer">
        Matrix Mayhem — PHP array operations and nested-loop rendering.
    </footer>
</body>
</html>