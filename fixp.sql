
CREATE DATABASE fixp COLLATE utf8mb4_unicode_520_ci;

USE fixp;

CREATE TABLE animals (
    id int(10) NOT NULL AUTO_INCREMENT,
    species VARCHAR (50),
    food_id int(10),
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_520_ci;

INSERT INTO animals (id, species, food_id) VALUES
  (1, 'обезьяны', 2),
  (2, 'львы', 1),
  (3, 'жирафы', 3);

CREATE TABLE food (
    id int(10) NOT NULL AUTO_INCREMENT,
    kind VARCHAR (50),
    animal_id int(10),
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_520_ci;

INSERT INTO food (id, kind, animal_id) VALUES
  (1, 'мясо', 2),
  (2, 'бананы', 1),
  (3, 'трава', 3);

CREATE TABLE students (
    id int(10) NOT NULL AUTO_INCREMENT,
    name VARCHAR (50),
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_520_ci;

INSERT INTO students (id, name) VALUES
  (1, 'Игорь'),
  (2, 'Паша');

CREATE TABLE feedings (
  id int(10) NOT NULL AUTO_INCREMENT,
  date date,
  student_id int(10),
  animal_id int(10),
  food_id int(10),
  amount int(5),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_520_ci;

INSERT INTO feedings (`id`, `date`, `student_id`, `animal_id`, `food_id`, `amount`) VALUES
(1, '2017-10-19', 1, 2, 1, 2),
(2, '2017-10-20', 1, 2, 1, 5),
(3, '2017-10-20', 2, 3, 3, 5),
(4, '2017-10-10', 1, 1, 2, 2),
(5, '2017-09-06', 1, 2, 1, 5),
(6, '2017-09-04', 1, 1, 2, 3);

ALTER TABLE feedings
  ADD FOREIGN KEY (food_id) REFERENCES food(id),
  ADD FOREIGN KEY (food_id) REFERENCES food(id),
  ADD FOREIGN KEY (food_id) REFERENCES food(id);

ALTER TABLE animals
  ADD FOREIGN KEY (food_id) REFERENCES food(id);

ALTER TABLE food
  ADD FOREIGN KEY (animal_id) REFERENCES animals(id);

-- Вид запросов, которые будут совершаться приложением

-- Выбрать все кормления, студент - Игорь.
SELECT
  feedings.date AS 'Дата',
  students.name AS 'Студент',
  animals.species AS 'Животное',
  food.kind AS 'Еда',
  feedings.amount AS 'Количество (кг)'
FROM
  feedings
JOIN students ON feedings.student_id = students.id
JOIN animals ON feedings.animal_id = animals.id
JOIN food ON feedings.food_id = food.id
WHERE
  students.name = 'Игорь';

-- Посчитать сколько всего съедено в кормлениях, где студент - Игорь.
SELECT
  food.kind AS 'Еда',
  SUM(feedings.amount) AS 'Количество (кг)'
FROM
  feedings
  JOIN students ON feedings.student_id = students.id
  JOIN animals ON feedings.animal_id = animals.id
  JOIN food ON feedings.food_id = food.id
WHERE
  feedings.date = 2017/10/19
GROUP BY
  food.kind;

