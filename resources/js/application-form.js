const form = document.getElementById("application-form");

if (form) {
    let workExperienceIndex = parseInt(form.dataset.workExperienceIndex || "0", 10);
    let educationalInstitutionIndex = parseInt(form.dataset.educationalInstitutionIndex || "0", 10);

    const addWorkExperience = () => {
        const container = document.getElementById("work_experiences_container");
        if (!container) {
            return;
        }

        const newFieldHtml = `<div class="work-experience-item border border-gray-600 rounded-lg p-6 mb-6 relative bg-gray-800/50">
        <button type="button" class="absolute top-4 right-4 text-red-500 hover:text-red-400 remove-item" aria-label="Close">×</button>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <label class="field">
                <input type="text" class="field-input field-input-full-width" name="work_experiences[${workExperienceIndex}][company_name]" placeholder="Название компании *" required>
            </label>
            <label class="field">
                <input type="text" class="field-input field-input-full-width" name="work_experiences[${workExperienceIndex}][position]" placeholder="Должность *" required>
            </label>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <label class="field">
                <input type="date" class="field-input field-input-full-width" name="work_experiences[${workExperienceIndex}][start_date]" required>
            </label>
            <label class="field">
                <input type="date" class="field-input field-input-full-width" name="work_experiences[${workExperienceIndex}][end_date]">
            </label>
        </div>
        <label class="field">
            <textarea class="field-input field-textarea w-100" name="work_experiences[${workExperienceIndex}][description]" rows="3" placeholder="Описание обязанностей"></textarea>
        </label>
    </div>`;

        container.insertAdjacentHTML("beforeend", newFieldHtml);
        workExperienceIndex++;
    };

    const addEducationalInstitution = () => {
        const container = document.getElementById("educational_institutions_container");
        if (!container) {
            return;
        }

        const newFieldHtml = `<div class="educational-institution-item border border-gray-600 rounded-lg p-6 mb-6 relative bg-gray-800/50">
        <button type="button" class="absolute top-4 right-4 text-red-500 hover:text-red-400 remove-item" aria-label="Close">×</button>
        <div class="mb-4">
            <label class="field">
                <input type="text" class="field-input field-input-full-width" name="educational_institutions[${educationalInstitutionIndex}][institution_name]" placeholder="Название учебного заведения *" required>
            </label>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <label class="field">
                <input type="text" class="field-input field-input-full-width" name="educational_institutions[${educationalInstitutionIndex}][degree]" placeholder="Степень/Специальность">
            </label>
            <label class="field">
                <input type="text" class="field-input field-input-full-width" name="educational_institutions[${educationalInstitutionIndex}][faculty]" placeholder="Факультет">
            </label>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <label class="field">
                <input type="date" class="field-input field-input-full-width" name="educational_institutions[${educationalInstitutionIndex}][start_date]">
            </label>
            <label class="field">
                <input type="date" class="field-input field-input-full-width" name="educational_institutions[${educationalInstitutionIndex}][end_date]">
            </label>
        </div>
        <label class="field">
            <textarea class="field-input field-textarea w-100" name="educational_institutions[${educationalInstitutionIndex}][description]" rows="3" placeholder="Дополнительная информация"></textarea>
        </label>
    </div>`;

        container.insertAdjacentHTML("beforeend", newFieldHtml);
        educationalInstitutionIndex++;
    };

    const removeItem = (event) => {
        if (event.target.classList.contains("remove-item")) {
            const item = event.target.closest(".work-experience-item, .educational-institution-item");
            if (item) {
                item.remove();
            }
        }
    };

    const setupCustomFieldToggle = (checkboxId, inputId, selectId) => {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);
        const select = document.getElementById(selectId);

        if (!checkbox || !input || !select) {
            return;
        }

        const toggleVisibility = () => {
            if (checkbox.checked) {
                select.value = "";
                input.style.display = "block";
                select.removeAttribute("required");
                input.setAttribute("required", "required");
                return;
            }

            input.style.display = "none";
            input.value = "";
            select.setAttribute("required", "required");
            input.removeAttribute("required");
        };

        checkbox.addEventListener("change", toggleVisibility);

        select.addEventListener("change", function onSelectChange() {
            if (this.value === "") {
                return;
            }

            checkbox.checked = false;
            input.style.display = "none";
            input.value = "";
            input.removeAttribute("required");
            select.setAttribute("required", "required");
        });

        toggleVisibility();
    };

    const setupSkillsFiltering = () => {
        const jobPositionCheckboxes = document.querySelectorAll('input[name="job_positions[]"]');
        const skillsPlaceholder = document.getElementById("skills-placeholder");
        const skillCheckboxes = document.querySelectorAll('input[name="technical_skills[]"]');
        const skillsUrl = form.dataset.skillsUrl || "";

        if (!skillsPlaceholder || !skillsUrl) {
            return;
        }

        const updateSkillsDisplay = (relevantSkillIds) => {
            skillsPlaceholder.style.display = "none";

            skillCheckboxes.forEach((checkbox) => {
                const skillDiv = checkbox.closest("div");
                if (!skillDiv) {
                    return;
                }

                if (relevantSkillIds.includes(parseInt(checkbox.value, 10))) {
                    skillDiv.style.display = "flex";
                    return;
                }

                skillDiv.style.display = "none";
                checkbox.checked = false;
            });
        };

        const fetchSkillsForPositions = (positionIds) => {
            const csrfMeta = document.querySelector('meta[name="csrf_token"]');
            const csrfToken = csrfMeta ? csrfMeta.getAttribute("content") : "";

            fetch(skillsUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({ positions: positionIds })
            })
                .then((response) => response.json())
                .then((data) => {
                    updateSkillsDisplay(data.skills || []);
                })
                .catch(() => {
                });
        };

        const updateSkillsVisibility = () => {
            const selectedPositions = Array.from(jobPositionCheckboxes)
                .filter((checkbox) => checkbox.checked)
                .map((checkbox) => checkbox.value);

            if (selectedPositions.length === 0) {
                skillsPlaceholder.style.display = "block";
                skillCheckboxes.forEach((checkbox) => {
                    const skillDiv = checkbox.closest("div");
                    if (skillDiv) {
                        skillDiv.style.display = "none";
                    }
                });
                return;
            }

            fetchSkillsForPositions(selectedPositions);
        };

        jobPositionCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", updateSkillsVisibility);
        });

        updateSkillsVisibility();
    };

    document.addEventListener("click", removeItem);

    setupCustomFieldToggle("custom_city_check", "custom_city", "city_id");
    setupCustomFieldToggle("custom_source_check", "custom_source", "source_id");
    setupCustomFieldToggle("custom_work_format_check", "custom_work_format", "work_format_id");
    setupCustomFieldToggle("custom_education_check", "custom_education", "education_id");
    setupSkillsFiltering();

    window.addWorkExperience = addWorkExperience;
    window.addEducationalInstitution = addEducationalInstitution;
}
