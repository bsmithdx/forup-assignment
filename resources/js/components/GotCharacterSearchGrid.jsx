import React from "react";
import SearchField from "./SearchField.jsx";
import CharacterTable from "./CharacterTable.jsx";

const GotCharacterSearchGrid = () => {
    const testCharacters = [
        {
            id: 3,
            name: "Walder",
            gender: "Male",
            culture: "Westerosi",
            aliases: ["Hodor"],
        },
        {
            id: 4,
            name: "Jon Snow",
            gender: "Male",
            culture: "Westerosi",
            aliases: [],
        }
    ];
    return (
        <div>
            <h1 className={"text-4xl"}>Game Of Thrones Character Search</h1>
            <SearchField />
            <CharacterTable items={ testCharacters } />
        </div>
    )
}

export default GotCharacterSearchGrid;
