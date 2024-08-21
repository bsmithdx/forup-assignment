import React from 'react';

const CharacterTableRow = ({ character }) => {

    return (
        <tr>
            <td>{character.name}</td>
            <td>{character.gender}</td>
            <td>{character.culture}</td>
            <td>{character.aliases ? character.aliases : ""}</td>
        </tr>
    )
}

export default CharacterTableRow;
