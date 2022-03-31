// Home Page component. Uses Inertia to pull data from the Laravel backend

import React, { useState } from "react";
import { Head } from "@inertiajs/inertia-react";
import axios from "axios";

// Function Home - main functino for displaying the homepage
// @Param: books - provided by Inertia from the Laravel backend before page creation.
export default function Home({ books }) {
    // Setup some state for the select fields
    const [chapters, setChapters] = useState([]);
    const [verses, setVerses] = useState([]);
    const [verse, setVerse] = useState([]);

    return (
        <>
            <Head title="Laravel/Inertial API Example" />
            <div className="App">
                <div className="container">
                    <div className="row">
                        <div className="twelve columns">
                            <h3>Laravel/Inertia API Example</h3>
                            <p>
                                This example uses Laravel with a SQLite DB on
                                the backend with a React frontend. Normally with
                                React I'd need a separate API told hold the data
                                but in this case Inertia acts as a bridge
                                between the backend and frontend. No need to
                                build out an entire separate API to get a
                                dynamic React front end. Just use the backend I
                                already have in place!
                            </p>
                        </div>
                    </div>

                    <div className="row">
                        <div className="one-third column">
                            <label htmlFor="book">Book</label>
                            <BookSelect
                                books={books}
                                setChapters={setChapters}
                                setVerses={setVerses}
                            />
                        </div>
                        <div className="one-third column">
                            <label htmlFor="chapter">Chapter</label>
                            <ChapterSelect
                                chapters={chapters}
                                setVerses={setVerses}
                            />
                        </div>
                        <div className="one-third column">
                            <label htmlFor="verse">Verse</label>
                            <VerseSelect verses={verses} setVerse={setVerse} />
                        </div>
                    </div>

                    <div className="row">
                        <div className="twelve columns">
                            <h5 className="search-result">Search Result</h5>
                            <VerseDisplay verse={verse} />
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}

// TODO: Need to setup state to hold the returned axios request.
// TODO: Need to make calls to the api for each select.
// TODO: Need to print the select options if te state data exists

// Function: BookSelect
// @Param: books - the initial book data passed from Inertia
// @Param: setChapters - so we can update the chapters select
// @Param: setVerses - so we can reset the verses select when the user picks a book
// This component displays the Book Select form input
const BookSelect = ({ books, setChapters, setVerses }) => {
    const onChangeHandler = (chapters) => {
        setChapters(chapters);
        setVerses([]);
    };

    return (
        <select
            className="u-full-width"
            placeholder="Select a book"
            onChange={(e) =>
                axios
                    .get(`/api/chapters/${e.target.value}`)
                    .then((res) => onChangeHandler(res.data))
            }
        >
            <option>Select a book</option>
            {books &&
                books?.map((book) => (
                    <option key={book.id} value={book.id}>
                        {book.bookTitle}
                    </option>
                ))}
        </select>
    );
};

// Function: ChapterSelect
// @Param: chapters - chapters data retrieve in the background from Laravel
// @Param: setVerses - so we can update the verses select
// This component displays the Chapters Select form input
const ChapterSelect = ({ chapters, setVerses }) => {
    return (
        <select
            className="u-full-width"
            id="chapter"
            placeholder="Select a chapter"
            onChange={(e) =>
                axios
                    .get(`/api/verses/${e.target.value}`)
                    .then((res) => setVerses(res.data))
            }
        >
            <option>Select a chapter</option>
            {chapters &&
                chapters?.map((chapter) => (
                    <option key={chapter.id} value={chapter.id}>
                        {chapter.chapterNumber}
                    </option>
                ))}
        </select>
    );
};

// Function: VerseSelect
// @Param: verses - verses data retrieve in the background from Laravel
// @Param: setVerse - so we can update the verse on the page
// This component displays the Verse Select form input
const VerseSelect = ({ verses, setVerse }) => {
    return (
        <select
            className="u-full-width"
            placeholder="Select a verse"
            onChange={(e) =>
                axios
                    .get(`/api/verse/${e.target.value}`)
                    .then((res) => setVerse(res.data))
            }
        >
            <option>Select a verse</option>
            {verses &&
                verses?.map((verse) => (
                    <option key={verse.id} value={verse.id}>
                        {verse.verseNumber}
                    </option>
                ))}
        </select>
    );
};

// Function: VerseDisplay
// @Param: verse - the verse to display
// This component displays the actual verse selected
const VerseDisplay = ({ verse }) => {
    if (!verse || verse.length === 0)
        return <p>Select a Book, then a Chapter and finally a Verse</p>;

    return (
        <>
            {verse && (
                <p>
                    {verse.verseNumber} {verse.scriptureText}
                </p>
            )}
        </>
    );
};
