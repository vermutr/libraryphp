CREATE TABLE accounts (
                          id serial PRIMARY KEY,
                          password VARCHAR ( 50 ) NOT NULL,
                          email VARCHAR ( 255 ) UNIQUE NOT NULL,
                          role varchar(50) NOT NULL DEFAULT 'USER'
);

CREATE TABLE authors (
                         id serial PRIMARY KEY,
                         name VARCHAR ( 50 ) NOT NULL,
                         surname VARCHAR ( 255 ) NOT NULL
);

CREATE TABLE books (
                       id serial PRIMARY KEY,
                       img VARCHAR ( 255 ) NOT NULL,
                       bookName VARCHAR ( 255 ) NOT NULL,
                       price VARCHAR ( 255 ) NOT NULL,
                       author_id INTEGER NOT NULL,
                       CONSTRAINT fk_author
                           FOREIGN KEY(author_id)
                               REFERENCES authors(id)
);

CREATE TABLE accounts_books (
                                id serial PRIMARY KEY,
                                book_id INTEGER NOT NULL,
                                account_id INTEGER NOT NULL,
                                CONSTRAINT fk_book_account_1
                                    FOREIGN KEY(book_id)
                                        REFERENCES books(id),
                                CONSTRAINT fk_book_account_2
                                    FOREIGN KEY(account_id)
                                        REFERENCES accounts(id)
);

CREATE TABLE cart (
                      id serial PRIMARY KEY,
                      book_id INTEGER NOT NULL,
                      account_id INTEGER NOT NULL,
                      CONSTRAINT fk_book_account_1
                          FOREIGN KEY(book_id)
                              REFERENCES books(id),
                      CONSTRAINT fk_book_account_2
                          FOREIGN KEY(account_id)
                              REFERENCES accounts(id)
);

CREATE TABLE tb_order (
                          id serial PRIMARY KEY,
                          book_id INTEGER NOT NULL,
                          account_id INTEGER NOT NULL,
                          CONSTRAINT fk_book_account_1
                              FOREIGN KEY(book_id)
                                  REFERENCES books(id),
                          CONSTRAINT fk_book_account_2
                              FOREIGN KEY(account_id)
                                  REFERENCES accounts(id)
);