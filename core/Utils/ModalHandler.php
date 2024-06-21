<?php

namespace CustomFormPlugin\Utils;

class ModalHandler
{
    public function showModalMessage($message): void
    {
        echo '
            <div id="customModal" class="modal">
                <div class="modal-content">
                    <span class="close-button">&times;</span>
                    <p>' . $message . '</p>
                </div>
            </div>';
        $this->addModalStyles();
        $this->addModalScript();
    }

    private function addModalStyles(): void
    {
        echo '
                <style>
                    .modal {
                        display: none;
                        position: fixed;
                        z-index: 1000;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        overflow: auto;
                        background-color: rgba(0, 0, 0, 0.4);
                    }
                
                    .modal-content {
                        background-color: #fefefe;
                        margin: 15% auto;
                        padding: 20px;
                        border: 1px solid #888;
                        width: 80%;
                        max-width: 500px;
                        text-align: center;
                    }
                
                    .close-button {
                        color: #aaa;
                        float: right;
                        font-size: 28px;
                        font-weight: bold;
                    }
                
                    .close-button:hover,
                    .close-button:focus {
                        color: black;
                        text-decoration: none;
                        cursor: pointer;
                    }
                </style>';
    }

    private function addModalScript(): void
    {
        echo '
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var modal = document.getElementById("customModal");
                        var span = document.getElementsByClassName("close-button")[0];
                
                        modal.style.display = "block";
                
                        span.onclick = function () {
                            modal.style.display = "none";
                        }
                
                        window.onclick = function (event) {
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                        }
                    });
                </script>';
    }
}
